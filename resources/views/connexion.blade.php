@extends('Layouts.HomeLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">Connexion</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('home.login')}}">
                        @csrf
                        @include('includes.input', [ 'label' =>'Adresse e-mail', 'name' => 'email', 'type'=> 'email' ])
                        @include('includes.input', [ 'label' =>'Mot de passe', 'name' => 'password', 'type' => 'password' ])
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        <a href="#" class="d-block text-center mt-2">Mot de passe oublié ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

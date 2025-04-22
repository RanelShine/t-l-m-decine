@extends('Layouts.HomeLayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Inscription Patient</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('home.register.patient')}}">
                        @csrf
                        @include('includes.input', [ 'label' =>'Nom complet', 'name' => 'nom', 'value' => $user->nom, ])
                        @include('includes.input', [ 'label' =>'Adresse e-mail', 'name' => 'email', 'value' => $user->email ,'type'=> 'email'])
                        @include('includes.input', [ 'label' =>'Numéro de téléphone', 'name' => 'telephone', 'type'=> 'number', 'value' => $user->telephone ])
                        @include('includes.input', [ 'label' =>'Date de naissance', 'name' => 'Date_de_Naissance', 'type' => 'date', 'value' => $patient->Date_de_Naissance ])
                        @include('includes.input', [ 'label' =>'Mot de passe', 'name' => 'password', 'type' => 'password' ])
                        <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                        <p class="text-center mt-3">Déjà inscrit ? <a href="{{route('home.login')}}">Connectez-vous ici</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
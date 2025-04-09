@extends('Layouts.HomeLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">Connexion</div>
                <div class="card-body">
                    <form method="POST" action="{{route('home.verification.login')}}">
                        @csrf
                        @include('includes.input', [ 'label' =>'Adresse e-mail', 'name' => 'email', 'value' => $user->email ])
                        @include('includes.input', [ 'label' =>'Mot de passe', 'name' => 'password', 'type' => 'password' ])
                        @include('includes.input', ['label'=> "Type d'utilisateur",'name'=> 'user_type','type'=> 'radio','value'=> old('user_type'),'options' => ['patient'=> 'Patient','doctor'=> 'Médecin', 'admin'=>'Administrateur', 'superadmin'=>'Super Administrateur']])
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        <a href="#" class="d-block text-center mt-2">Mot de passe oublié ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

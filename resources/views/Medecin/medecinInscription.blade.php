@extends('Layouts.HomeLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Inscription Médecin</div>
                <div class="card-body">
                    <form method="POST" action="{{route('home.verification.register.medecin')}}">
                        @csrf
                        @include('includes.input', [ 'label' =>'Nom complet', 'name' => 'nom', 'value' => $user->nom ])
                        @include('includes.input', [ 'label' =>'Adresse e-mail', 'name' => 'email', 'value' => $user->email ])
                        @include('includes.input', [ 'label' =>'Numéro de téléphone', 'name' => 'telephone', 'value' => $user->telephone ])
                        @include('includes.select', ['label' => 'Spécialité','name' => 'specialite','options' => ['généraliste' => 'Médecin généraliste','cardiologue' => 'Cardiologue','dermatologue' => 'Dermatologue','traumatologue'=>'Traumatologue', 'autre' => 'Autre'],'value' => $medecin->specialite])
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

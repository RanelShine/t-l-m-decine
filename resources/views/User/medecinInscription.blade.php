@extends('User.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Inscription Médecin</div>
                <div class="card-body">
                    <form method="POST" action="{{route('verification.register.medecin')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Numéro de téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="speciality">Spécialité</label>
                            <select class="form-control" id="speciality" name="speciality" required>
                                <option value="">Sélectionner une spécialité</option>
                                <option value="généraliste">Médecin généraliste</option>
                                <option value="cardiologue">Cardiologue</option>
                                <option value="dermatologue">Dermatologue</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                        <p class="text-center mt-3">Déjà inscrit ? <a href="#">Connectez-vous ici</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

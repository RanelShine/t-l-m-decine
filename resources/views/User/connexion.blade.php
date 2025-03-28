@extends('User.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">Connexion</div>
                <div class="card-body">
                    <form method="POST" action="{{route('verification.login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <div class="form-group">
                            <label>Type d'utilisateur :</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="patient" value="patient" checked>
                                <label class="form-check-label" for="patient">Patient</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="doctor" value="doctor">
                                <label class="form-check-label" for="doctor">Médecin</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        <a href="#" class="d-block text-center mt-2">Mot de passe oublié ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

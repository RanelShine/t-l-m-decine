<!-- Début en-tête -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="assets/User/images/logo.png" alt="Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-between" id="navbar-wd">
                <ul class="navbar-nav main-menu">
                    <li class="nav-item"><a class="nav-link active" href="#home">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Infos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#appointment">RDV</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Médecins</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                <ul class="navbar-nav auth-menu ml-auto">
                    <!-- Si l'utilisateur n'est pas connecté -->
                    @guest

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link btn btn-outline-primary mx-1 dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user-plus mr-1"></i> S'inscrire
                            </a>
                            <div class="dropdown-menu p-3" style="min-width: 250px;">
                                <h4 class="dropdown-header">Je suis :</h4>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('home.register.patient') }}">
                                    <i class="fa fa-user mr-2"></i> Patient
                                </a>
                                <a class="dropdown-item" href="{{ route('home.register.medecin') }}">
                                    <i class="fa fa-user-md mr-2"></i> Médecin
                                </a>
                            </div>
                        </li>
                

                        <li class="nav-item dropdown">
                            <a href="{{route('home.login')}}" class="nav-link btn btn-primary mx-1 dropdown-toggle">
                                <i class="fas fa-sign-in-alt mr-1"></i> Connexion
                            </a>
                            </div>
                        </li>
                    @endguest
                
                    <!-- Si l'utilisateur est connecté -->
                    @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link btn btn-outline-secondary mx-1 dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user-circle mr-1"></i> Mon compte
                            </a>
                            <div class="dropdown-menu p-3">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user mr-2"></i> Profil
                                </a>
                                <a class="dropdown-item" href="{{ route('home.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('home.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
                
            </div>
        </div>
    </nav>
</header>
<!-- Fin en-tête -->

<style>
    /* Style général de la navbar */
.navbar-nav {
    display: flex;
    align-items: center;
    gap: 20px; /* Ajoute un espacement entre les éléments */
}

.navbar-nav .nav-link {
    font-size: 14px; /* Taille du texte réduite */
    white-space: nowrap; /* Empêche le passage à la ligne */
    padding: 6px 10px; /* Réduit l’espace autour du texte */
}

.navbar-brand img {
    max-height: 40px; /* Ajuste la hauteur */
    width: auto; /* Garde les proportions */
    display: block; /* Assure qu'il est bien visible */
}

/* Espacement pour les liens du menu */
.navbar-nav .nav-item {
    margin-right: 15px;
}

/* Boutons Connexion et Inscription */
.auth-menu .nav-link {
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 5px;
}

/* Espacement des dropdowns */
.auth-menu .dropdown-menu {
    margin-top: 10px;
    padding: 15px;
}

/* Ajustement de la hauteur pour éviter la surcharge */
.top-header {
    padding: 15px 0;
}

.navbar-brand img {
    max-height: 50px; /* Ajuste la hauteur du logo */
}

/* Réduction du padding pour éviter l'effet écrasé */
.nav-link {
    padding: 8px 12px;
}

/* Ajustement pour le menu responsive */
@media (max-width: 992px) {
    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
    }
}

</style>
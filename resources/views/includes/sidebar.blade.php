<!-- sidebar.blade.php -->
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">
                    @if(Auth::user()->roles->contains('name', 'admin'))
                            Administrateur
                        @elseif(Auth::user()->roles->contains('name', 'patient'))
                            Patient
                        @elseif(Auth::user()->roles->contains('name', 'medecin'))
                            Medecin
                        @elseif(Auth::user()->roles->contains('name', 'assistant'))
                            Assistant
                        @endif
                        <i class="fa fa-caret-down"></i>
                    </span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                    <a href="#" data-toggle="modal" data-target="#profileModal"><i class="ti-user"></i> Profil</a>
                        <a href="#!"><i class="ti-settings"></i>Paramètre</a>
                        <a class="dropdown-item" href="{{ route('home.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Deconnexion</a>
                        <form id="logout-form" action="{{ route('home.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="index.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            @if(Auth::user()->roles->contains('name', 'admin'))
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Patients &amp; Médecins</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Médecins</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="#patients-section" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Patients</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="button.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Rendez-vous</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="tabs.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Requests</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="typography.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Typography</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
        
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Dossiers medicaux</div>
        <ul class="pcoded-item pcoded-left-item">
        @if(Auth::user()->roles->contains('name', 'medecin'))
            <li>
                <a href="form-elements-component.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Patients</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            
            <li>
                <a href="form-elements-component.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-folder"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dossiers medicaux</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="bs-basic-table.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">resultats</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @if(Auth::user()->roles->contains('name', 'medecin') || Auth::user()->roles->contains('name', 'patient'))
            <li>
                <a href="bs-basic-table.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bell"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">
                        @if(Auth::user()->role == 'medecin')
                        Rendez-vous
                        @else
                        Rendez-vous
                        @endif
                    </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Prescriptions </div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="chart.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-leaf ti-write"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Prescriptions</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-medall"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">medicaments</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.other">
            @if(Auth::user()->roles->contains('name', 'admin'))
                Admin panel
            @elseif(Auth::user()->roles->contains('name', 'patient'))
                Patient panel
            @elseif(Auth::user()->roles->contains('name', 'medecin'))
                Doctor panel
            @endif
        </div>
        <ul class="pcoded-item pcoded-left-item">
            @if(Auth::user()->role == 'medecin' || Auth::user()->role == 'patient')
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-email"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Messages</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            
            @if(Auth::user()->roles->contains('name', 'medecin') || Auth::user()->roles->contains('name', 'patient'))
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-files"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Formulaires</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-settings"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">paramètres</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ Auth::user()->nom }}</p>
        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

    </div>
    
</nav>
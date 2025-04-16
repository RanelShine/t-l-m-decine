@extends('dashboard.dashboardlayout')

@section('content')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome to Doc Talk</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-purple">300</h4>
                                            <h6 class="text-muted m-b-0">patients</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">% change</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green">20+</h4>
                                            <h6 class="text-muted m-b-0">Spécialistes</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-file-text-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">% change</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">145</h4>
                                            <h6 class="text-muted m-b-0">consutations </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-calendar-check-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">% change</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-blue">500</h4>
                                            <h6 class="text-muted m-b-0">dossiers </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-hand-o-down f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">% change</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- task, page, download counter  end -->

                        <!--  sale analytics start -->
                        <div class="col-xl-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Evolution des consultations</h5>
                                    <span class="text-muted">Get 15% Off on <a href="https://www.amcharts.com/" target="_blank">amCharts</a> licences. Use code "codedthemes" and get the discount.</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <h4>$256.23</h4>
                                            <p class="text-muted">This Month</p>
                                        </div>
                                        <div class="col-auto">
                                            <label class="label label-success">+20%</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <canvas id="this-month" style="height: 150px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card quater-card">
                                <div class="card-block">
                                    <h6 class="text-muted m-b-15">This Quarter</h6>
                                    <h4>$3,9452.50</h4>
                                    <p class="text-muted">$3,9452.50</p>
                                    <h5>87</h5>
                                    <p class="text-muted">Online Revenue<span class="f-right">80%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-c-blue" style="width: 80%"></div>
                                    </div>
                                    <h5 class="m-t-15">68</h5>
                                    <p class="text-muted">Offline Revenue<span class="f-right">50%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-c-green" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  sale analytics end -->

                        <!--  gestion des patients -->
                        <div class="col-xl-10 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">

                                    <div id="patients-section" class="container" style="overflow-x:auto; max-height: 400Px;">
                                        <!-- dashboard.blade.php -->
                                        <h1>Liste des Patients</h1>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Actions</th> <!-- Colonne Action ajoutée -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($patients as $index => $patient)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $patient->user->nom }}</td>
                                                    <td>{{ $patient->user->email }}</td>
                                                    <td>{{ $patient->user->telephone }}</td>

                                                    <!-- Colonne Actions avec boutons -->
                                                    <td>
                                                        <!-- Bouton de mise à jour (update) -->
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModal{{ $patient->id }}">
                                                            Update
                                                        </button>

                                                        <!-- Bouton de suppression (delete) -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $patient->id }}">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Modal de mise à jour -->
                    @foreach($patients as $patient)
                    <div class="modal fade" id="updateModal{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $patient->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{ $patient->id }}">Modifier les informations du patient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Utilisation de PUT pour la mise à jour -->
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $patient->user->nom }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $patient->user->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone">Téléphone</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $patient->user->telephone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_naissance">Date de naissance</label>
                                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $patient->Date_de_Naissance }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Modal de suppression -->
                    @foreach($patients as $patient)
                    <div class="modal fade" id="deleteModal{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $patient->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $patient->id }}">Confirmer la suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer ce patient ?</p>
                                    <p><strong>Nom : </strong>{{ $patient->user->nom }}</p>
                                    <p><strong>Email : </strong>{{ $patient->user->email }}</p>
                                    <p><strong>Téléphone : </strong>{{ $patient->user->telephone }}</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('patients.delete', $patient->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- fin gestion des patients -->

                   

                    <div class="col-xl-4 col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h5>Team Members</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-trash close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="align-middle m-b-30">
                                    <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>David Jones</h6>
                                        <p class="text-muted m-b-0">Developer</p>
                                    </div>
                                </div>
                                <div class="align-middle m-b-30">
                                    <img src="assets/images/avatar-1.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>David Jones</h6>
                                        <p class="text-muted m-b-0">Developer</p>
                                    </div>
                                </div>
                                <div class="align-middle m-b-30">
                                    <img src="assets/images/avatar-3.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>David Jones</h6>
                                        <p class="text-muted m-b-0">Developer</p>
                                    </div>
                                </div>
                                <div class="align-middle m-b-30">
                                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>David Jones</h6>
                                        <p class="text-muted m-b-0">Developer</p>
                                    </div>
                                </div>
                                <div class="align-middle m-b-10">
                                    <img src="assets/images/avatar-5.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>David Jones</h6>
                                        <p class="text-muted m-b-0">Developer</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  project and team member end -->
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
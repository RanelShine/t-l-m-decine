@extends('Layouts.dashboardlayout')

@section('content')
<!-- @auth
    <div class="card-header text-center">
        Salut, {{ Auth::user()->name }}.
        @if(Auth::user()->roles->isNotEmpty())
            {{ Auth::user()->roles->first()->name }}
        @else
            (Aucun rôle)
        @endif
    </div>
@endauth -->


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                    @if(Auth::user()->roles->contains('name', 'admin'))
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
                            <h1 class="bg-success text-center pb-3 pt-3">Liste des Patients</h1>
                                <div class="card-header">
                                
                                    <div id="patients-section" class="container" style="overflow-x:auto; max-height: 400Px;">
                                        <!-- dashboard.blade.php -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
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
                                        @method('PUT') 
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

                       <!--  gestion des medecin -->
                       <div class="col-xl-10 col-md-12">
                            <div class="card table-card">
                            <h1 class="bg-primary text-center pb-3 pt-3">Liste des Medecins</h1>
                                <div class="card-header">
                                
                                    <div id="medecins-section" class="container" style="overflow-x:auto; max-height: 400Px;">
                                        <!-- dashboard.blade.php -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Spécialité</th>
                                                    <th>Actions</th> <!-- Colonne Action ajoutée -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medecins as $index => $medecin)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $medecin->user->nom }}</td>
                                                    <td>{{ $medecin->user->email }}</td>
                                                    <td>{{ $medecin->user->telephone }}</td>
                                                    <td>{{ $medecin->specialite }}</td>
                                                    <!-- Colonne Actions avec boutons -->
                                                    <td>
                                                        <!-- Bouton de mise à jour (update) -->
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModalm{{$medecin->id }}">
                                                            Update
                                                        </button>

                                                        <!-- Bouton de suppression (delete) -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModalm{{ $medecin->id }}">
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
                    @foreach($medecins as $medecin)
                    <div class="modal fade" id="updateModalm{{ $medecin->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $medecin->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{ $medecin->id }}">Modifier les informations du patient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('medecins.update', $medecin->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') 
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $medecin->user->nom }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $medecin->user->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone">Téléphone</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $medecin->user->telephone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_naissance">Date de naissance</label>
                                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $medecin->Date_de_Naissance }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Modal de suppression -->
                    @foreach($medecins as $medecin)
                    <div class="modal fade" id="deleteModalm{{ $medecin->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $medecin->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $medecin->id }}">Confirmer la suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer ce medecin ?</p>
                                    <p><strong>Nom : </strong>{{ $medecin->user->nom }}</p>
                                    <p><strong>Email : </strong>{{ $medecin->user->email }}</p>
                                    <p><strong>Téléphone : </strong>{{ $medecin->user->telephone }}</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('medecins.delete', $patient->id) }}" method="POST" style="display: inline;">
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
                    <!-- fin gestion des medecins -->
@endif

@if(Auth::user()->roles->contains('name','medecin'))
    <div class="card">
        <div class="card-header">
            <h5>Mes rendez-vous</h5>
        </div>
        <div class="card-body" style="overflow-x:auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rvs as $i => $rv)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $rv->patient->user->nom }}</td>
                        <td>{{ $rv->date_rendezvous->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($rv->heure)->format('H:i') }}</td>
                        <td>
                        @switch($rv->status)
        @case('confirmé')
            <span class="badge badge-primary">Confirmé</span>
            @break
        @case('terminé')
            <span class="badge badge-success">Réalisé</span>
            @break
        @case('annulé')
            <span class="badge badge-danger">Annulé</span>
            @break
        @case('absent')
            <span class="badge badge-dark">Absent</span>
            @break
        @case('affecté')
            <span class="badge badge-dark">Affecté</span>
            @break
        @default
            <span class="badge badge-warning">En attente</span>
    @endswitch
                        </td>
                        <td>
                        @if($rv->status === 'affecté')
      <button class="btn btn-sm btn-primary"
              data-toggle="modal"
              data-target="#confirmModal{{ $rv->id }}">
          valider
      </button>
  @else
                                —
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals de confirmation --}}
    @foreach($rvs as $rv)
<div class="modal fade" id="confirmModal{{ $rv->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('rendezvous.confirm', $rv->id) }}" method="POST">
        @csrf
        <input type="hidden" name="medecin_id" value="{{ Auth::user()->medecin->id }}">
        <div class="modal-header">
          <h5 class="modal-title">Confirmer le rendez-vous</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous confirmer ce rendez-vous ?</p>
          <p><strong>Patient :</strong> {{ $rv->patient->user->nom }}</p>
          <p><strong>Date :</strong> {{ $rv->date_rendezvous->format('d/m/Y') }}
             à {{ \Carbon\Carbon::parse($rv->heure)->format('H:i') }}</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Confirmer</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach


    @endif
 
          
@if(Auth::user()->roles->contains('name', 'patient'))
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header text-center bg-success">
                    <h5>Prise de rendez-vous</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('rendezvous.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="date_rendezvous">Date</label>
                            <input type="date" name="date_rendezvous" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="heure">Heure</label>
                            <input type="time" name="heure" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="localisation">Localisation</label>
                            <input type="texte" name="localisation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="motif">Motif de la consultation</label>
                            <textarea name="motif" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Prendre rendez-vous</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

            
@if(Auth::user()->roles->contains('name', 'assistant'))
<div class="card">
    <div class="card-header">
        <h5>Liste des rendez-vous</h5>
    </div>
    <div class="card-body" style="overflow-x:auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rvs as $i => $rv)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $rv->patient->user->nom }}</td>
                    <td>{{ $rv->date_rendezvous->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($rv->heure)->format('H:i') }}</td>
                    <td>
                    <td>
    @switch($rv->status)
        @case('confirmé')
            <span class="badge badge-primary">Confirmé</span>
            @break
        @case('terminé')
            <span class="badge badge-success">Réalisé</span>
            @break
        @case('annulé')
            <span class="badge badge-danger">Annulé</span>
            @break
        @case('absent')
            <span class="badge badge-dark">Absent</span>
            @break
        @case('affecté')
            <span class="badge badge-dark">Affecté</span>
            @break
        @default
            <span class="badge badge-warning">En attente</span>
    @endswitch
</td>

                    </td>
                    <td>
                        @if($rv->status === 'en_attente')
                            <button class="btn btn-sm btn-primary"
                                    data-toggle="modal"
                                    data-target="#confirmModal{{ $rv->id }}">
                                Confirmer
                            </button>
                        @else
                            —
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modals de confirmation --}}
@foreach($rvs as $rdv)
<div class="modal fade" id="confirmModal{{ $rdv->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('rdv.confirmer', $rdv->id) }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Confirmer le rendez-vous</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous confirmer ce rendez-vous ?</p>
          <p><strong>Patient :</strong> {{ $rdv->patient->user->nom }}</p>
          <p><strong>Date :</strong> {{ $rdv->date_rendezvous->format('d/m/Y') }}
             à {{ \Carbon\Carbon::parse($rdv->heure)->format('H:i') }}</p>
          
          <div class="form-group">
            <label for="medecin_id"><strong>Affecter au médecin :</strong></label>
            <select name="medecin_id" id="medecin_id" class="form-control" required>
              <option value="">-- Sélectionner un médecin --</option>
              @foreach($medecins as $medecin)
                <option value="{{ $medecin->id }}" {{ $rdv->medecin_id == $medecin->id ? 'selected' : '' }}>
                  Dr. {{ $medecin->user->nom }} {{ $medecin->user->prenom }} - {{ $medecin->specialite }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Confirmer</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@endif
                   
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
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
                        
<!-- debut section de rdv -->
<div class="card" id="rendezvous-section">
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
    </tr>
    @endforeach
</tbody>

        </table>
    </div>
</div>
                        <!--  fin gestion des rdv -->

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
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Section des rendez-vous -->
        <div class="card" id="rendezvous-section">
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

        <!-- Carte des prescriptions -->
        <div class="col-md-6 mb-4" id="prescriptions-section">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Mes prescriptions</h5>
                </div>
                <div class="card-body">
                    <!-- Logique de la prescription -->
                    <p>Aucune prescription disponible pour le moment.</p>
                </div>
            </div>
        </div>

        <!-- Carte du dossier médical -->
        <div class="col-md-6 mb-4" id="dossier-medical-section">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Dossier Médical</h5>
                </div>
                <div class="card-body">
                    <!-- Logique du dossier médical -->
                    <p>Aucun dossier médical disponible pour le moment.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- formulaire -->
<div class="container mt-4" id="form-section">
    <div class="row justify-content-center">
        <!-- Carte pour les médecins -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Gestion des Dossiers Médicaux et Prescriptions</h5>
                </div>
                <div class="card-body text-center">
                    <!-- Boutons d'action -->
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#prescriptionModal">Faire une Prescription</button>
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addDossierModal">Ajouter un Dossier Médical</button>
                    <button class="btn btn-warning mb-3" data-toggle="modal" data-target="#editDossierModal">Éditer un Dossier Médical</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modale pour faire une prescription -->
<div class="modal fade" id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="prescriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="prescriptionModalLabel">Faire une Prescription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Champ pour la prescription -->
          <div class="form-group">
            <label for="patient">Patient</label>
            <select name="patient_id" class="form-control" required>
              <option value="">Sélectionner un patient</option>
              <!-- Options de patients ici -->
              @foreach($patients as $patient)
              <option value="{{ $patient->id }}">{{ $patient->user->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="medication">Médicaments</label>
            <textarea name="medication" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Sauvegarder</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modale pour ajouter un dossier médical -->
<div class="modal fade" id="addDossierModal" tabindex="-1" role="dialog" aria-labelledby="addDossierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addDossierModalLabel">Ajouter un Dossier Médical</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulaire d'ajout du dossier médical -->
          <div class="form-group">
            <label for="patient">Patient</label>
            <select name="patient_id" class="form-control" required>
              <option value="">Sélectionner un patient</option>
              <!-- Options de patients ici -->
              @foreach($patients as $patient)
              <option value="{{ $patient->id }}">{{ $patient->user->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="dossier_details">Détails du Dossier Médical</label>
            <textarea name="dossier_details" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Sauvegarder</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modale pour éditer un dossier médical -->
<div class="modal fade" id="editDossierModal" tabindex="-1" role="dialog" aria-labelledby="editDossierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST">
        @csrf
        <input type="hidden" name="dossier_id" id="dossier_id" value="">
        <div class="modal-header">
          <h5 class="modal-title" id="editDossierModalLabel">Éditer un Dossier Médical</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulaire d'édition du dossier médical -->
          <div class="form-group">
            <label for="edit_patient">Patient</label>
            <select name="patient_id" id="edit_patient" class="form-control" required>
              <option value="">Sélectionner un patient</option>
              <!-- Options de patients ici -->
              @foreach($patients as $patient)
              <option value="{{ $patient->id }}">{{ $patient->user->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="edit_dossier_details">Détails du Dossier Médical</label>
            <textarea name="dossier_details" id="edit_dossier_details" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Mettre à jour</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- patient -->
<div class="container mt-4" id="patient-section">
    <div class="row justify-content-center">
        <!-- Carte pour la liste des patients -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Liste des Patients</h5>
                </div>
                <div class="card-body" style="overflow-x:auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Patient</th>
                                <th>Date du Rendez-vous</th>
                                <th>Heure</th>
                                <th>Statut</th>
                                <th>prescription</th>
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
                                                <span class="badge badge-warning">Affecté</span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">En attente</span>
                                        @endswitch
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    @endif
 
          
@if(Auth::user()->roles->contains('name', 'patient'))
<!-- section de rdv -->
        <div class="col-xl-8 col-md-12" id="rendezvous-section">
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

        <!-- fin section rdv -->
         
        <div class="row">
    <!-- Carte des prescriptions -->
    <div class="col-md-6" id="prescriptions-section">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Mes prescriptions</h5>
            </div>
            <div class="card-body">
                
                <!-- definition de la logique de la prescription -->
            </div>
        </div>
    </div>

    <!-- Carte du dossier médical -->
    <div class="col-md-6" id="dossier-medical-section">
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Mon dossier médical</h5>
            </div>
            <div class="card-body">

                <!-- definition de la logique du dossier medical -->
            </div>
        </div>
    </div>
</div>

    @endif

            
@if(Auth::user()->roles->contains('name', 'assistant'))
<!-- section de rdv -->
<div class="card" id="rendezvous-section">
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
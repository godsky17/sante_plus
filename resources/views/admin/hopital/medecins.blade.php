@extends('layouts.hopital')

@section('title', 'Liste des medecins - Santé Plus')

@section('content-admin')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard / Medecins</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Transaction History</div>
                        <div class="card-tools">
                            <div class="dropdown">
                                <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Type établissement</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medecins as $medecin)
                                    <tr>
                                        <td>{{ $medecin->nom_admin ?? $medecin->nom }}</td>
                                        <td>{{ $medecin->email }}</td>
                                        <td>{{ $medecin->telephone }}</td>
                                        <td>{{ ucfirst($medecin->type_etablissement ?? 'N/A') }}</td>
                                        <td>
                                            @if ($medecin->statut === 'en attente')
                                                <span class="badge bg-warning">En attente</span>
                                            @elseif($medecin->statut === 'valide')
                                                <span class="badge bg-success">Validé</span>
                                            @elseif($medecin->statut === 'rejete')
                                                <span class="badge bg-danger">Rejeté</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($medecin->statut) }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('medecins.valider', $medecin->_id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" title="Valider">
                                                    Valider
                                                </button>
                                            </form>
                                            <form action="{{ route('medecins.rejeter', $medecin->_id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" title="Rejeter">
                                                    Rejeter
                                                </button>
                                            </form>
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
@endsection

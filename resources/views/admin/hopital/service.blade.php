@extends('layouts.hopital')

@section('title', 'Docteurs - Santé Plus')

@section('content-admin')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard / Services</h3>
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
                    <div class="card-head-row">
                        <div class="card-title">Liste des services</div>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalCreateService">
                                + Ajouter un service
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if ($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->nom }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td class="text-end">
                                                <!-- Modifier -->
                                                <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                                    data-bs-target="#editServiceModal{{ $service->_id }}">
                                                    Modifier
                                                </button>
                                                <!-- Supprimer -->
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal{{ $service->_id }}">
                                                    Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4">
                            <div class="alert alert-warning mb-0">Aucun service trouvé.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'ajout de service -->
    <div class="modal fade" id="modalCreateService" tabindex="-1" aria-labelledby="modalCreateServiceLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('hopital.services.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCreateServiceLabel">Ajouter un service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom du service</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                                value="{{ old('nom') }}">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label>Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modals d'édition + suppression -->
    @foreach ($services as $service)
        <!-- Modal édition -->
        <div class="modal fade" id="editServiceModal{{ $service->_id }}" tabindex="-1"
            aria-labelledby="editServiceModalLabel{{ $service->_id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('hopital.services.update', $service->_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editServiceModalLabel{{ $service->_id }}">Modifier le service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control" value="{{ $service->nom }}">
                            </div>
                            <div class="form-group mt-2">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $service->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal confirmation suppression -->
        <div class="modal fade" id="confirmDeleteModal{{ $service->_id }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $service->_id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('hopital.services.destroy', $service->_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $service->_id }}">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer le service <strong>{{ $service->nom }}</strong> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

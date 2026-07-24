@extends('layouts.app')

@section('title', 'Liste des ouvrages')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="mb-0">📖 Catalogue des ouvrages</h2>
        <a href="{{ route('ouvrages.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un ouvrage
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($ouvrages->isEmpty())
                <p class="text-center text-muted my-4">
                    Aucun ouvrage enregistré pour le moment.
                </p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Auteur / Éditeur</th>
                                <th>ISBN</th>
                                <th class="text-center">Exemplaires</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ouvrages as $ouvrage)
                                <tr>
                                    <td>{{ $ouvrage->titre }}</td>
                                    <td>{{ $ouvrage->auteur_editeur }}</td>
                                    <td>{{ $ouvrage->isbn }}</td>
                                    <td class="text-center">{{ $ouvrage->nb_exemplaires }}</td>
                                    <td class="text-center">
                                        @if ($ouvrage->statut)
                                            <span class="badge badge-statut-disponible">Disponible</span>
                                        @else
                                            <span class="badge badge-statut-epuise">Épuisé</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('ouvrages.edit', $ouvrage->id) }}"
                                           class="btn btn-warning btn-sm text-white me-1">
                                            Modifier
                                        </a>

                                        <button type="button"
                                                class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $ouvrage->id }}">
                                            Supprimer
                                        </button>

                                        <div class="modal fade" id="deleteModal{{ $ouvrage->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Es-tu sûr de vouloir supprimer l'ouvrage
                                                        <strong>« {{ $ouvrage->titre }} »</strong> ?
                                                        Cette action est irréversible.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                                            Annuler
                                                        </button>
                                                        <form action="{{ route('ouvrages.destroy', $ouvrage->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Oui, supprimer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>

@endsection
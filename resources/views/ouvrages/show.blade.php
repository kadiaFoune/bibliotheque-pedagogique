@extends('layouts.app')

@section('title', 'Détail de l\'ouvrage')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📘 Détail de l'ouvrage</h2>
        <a href="{{ route('ouvrages.index') }}" class="btn btn-secondary btn-sm">
            Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body p-4">

            <dl class="row">
                <dt class="col-sm-3">Titre</dt>
                <dd class="col-sm-9">{{ $ouvrage->titre }}</dd>

                <dt class="col-sm-3">Éditeur / Auteur</dt>
                <dd class="col-sm-9">{{ $ouvrage->auteur_editeur }}</dd>

                <dt class="col-sm-3">Code ISBN</dt>
                <dd class="col-sm-9">{{ $ouvrage->isbn }}</dd>

                <dt class="col-sm-3">Nombre d'exemplaires</dt>
                <dd class="col-sm-9">{{ $ouvrage->nb_exemplaires }}</dd>

                <dt class="col-sm-3">Statut</dt>
                <dd class="col-sm-9">
                    @if ($ouvrage->statut)
                        <span class="badge badge-statut-disponible">Disponible</span>
                    @else
                        <span class="badge badge-statut-epuise">Épuisé</span>
                    @endif
                </dd>

                <dt class="col-sm-3">Ajouté le</dt>
                <dd class="col-sm-9">{{ $ouvrage->created_at->format('d/m/Y à H:i') }}</dd>
            </dl>

            <a href="{{ route('ouvrages.edit', $ouvrage->id) }}" class="btn btn-warning text-white">
                Modifier
            </a>

        </div>
    </div>

@endsection
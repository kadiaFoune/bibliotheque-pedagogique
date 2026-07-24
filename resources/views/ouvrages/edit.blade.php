@extends('layouts.app')

@section('title', 'Modifier un ouvrage')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">✏️ Modifier l'ouvrage</h2>
        <a href="{{ route('ouvrages.index') }}" class="btn btn-secondary btn-sm">
            Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body p-4">

            <form action="{{ route('ouvrages.update', $ouvrage->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre de l'ouvrage</label>
                    <input type="text"
                           name="titre"
                           id="titre"
                           class="form-control @error('titre') is-invalid @enderror"
                           value="{{ old('titre', $ouvrage->titre) }}">
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="auteur_editeur" class="form-label">Éditeur / Auteur</label>
                    <input type="text"
                           name="auteur_editeur"
                           id="auteur_editeur"
                           class="form-control @error('auteur_editeur') is-invalid @enderror"
                           value="{{ old('auteur_editeur', $ouvrage->auteur_editeur) }}">
                    @error('auteur_editeur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">Code ISBN</label>
                    <input type="text"
                           name="isbn"
                           id="isbn"
                           class="form-control @error('isbn') is-invalid @enderror"
                           value="{{ old('isbn', $ouvrage->isbn) }}"
                           maxlength="20">
                    @error('isbn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nb_exemplaires" class="form-label">Nombre d'exemplaires</label>
                    <input type="number"
                           name="nb_exemplaires"
                           id="nb_exemplaires"
                           class="form-control @error('nb_exemplaires') is-invalid @enderror"
                           value="{{ old('nb_exemplaires', $ouvrage->nb_exemplaires) }}"
                           min="0">
                    @error('nb_exemplaires')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="statut" class="form-label">Statut global</label>
                    <select name="statut"
                            id="statut"
                            class="form-select @error('statut') is-invalid @enderror">
                        <option value="1" {{ old('statut', $ouvrage->statut) == '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('statut', $ouvrage->statut) == '0' ? 'selected' : '' }}>Épuisé</option>
                    </select>
                    @error('statut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>
                <a href="{{ route('ouvrages.index') }}" class="btn btn-outline-secondary">
                    Annuler
                </a>

            </form>

        </div>
    </div>

@endsection
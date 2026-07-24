@extends('layouts.app')

@section('title', 'Ajouter un ouvrage')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">➕ Ajouter un ouvrage</h2>
        <a href="{{ route('ouvrages.index') }}" class="btn btn-secondary btn-sm">
            Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body p-4">

            <form action="{{ route('ouvrages.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre de l'ouvrage</label>
                    <input type="text"
                           name="titre"
                           id="titre"
                           class="form-control @error('titre') is-invalid @enderror"
                           value="{{ old('titre') }}"
                           placeholder="Ex : Introduction à l'Algorithmique">
                    @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="auteur_editeur" class="form-label">Éditeur / Auteur</label>
                    <input type="text"
                           name="auteur_editeur"
                           id="auteur_editeur"
                           class="form-control @error('auteur_editeur') is-invalid @enderror"
                           value="{{ old('auteur_editeur') }}"
                           placeholder="Ex : Editions Dunod">
                    @error('auteur_editeur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">Code ISBN</label>
                    <input type="text"
                           name="isbn"
                           id="isbn"
                           class="form-control @error('isbn') is-invalid @enderror"
                           value="{{ old('isbn') }}"
                           placeholder="Ex : 978-2-1234-5678-9"
                           maxlength="20">
                    @error('isbn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nb_exemplaires" class="form-label">Nombre d'exemplaires</label>
                    <input type="number"
                           name="nb_exemplaires"
                           id="nb_exemplaires"
                           class="form-control @error('nb_exemplaires') is-invalid @enderror"
                           value="{{ old('nb_exemplaires', 0) }}"
                           min="0">
                    @error('nb_exemplaires')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="statut" class="form-label">Statut global</label>
                    <select name="statut"
                            id="statut"
                            class="form-select @error('statut') is-invalid @enderror">
                        <option value="1" {{ old('statut') == '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('statut') == '0' ? 'selected' : '' }}>Épuisé</option>
                    </select>
                    @error('statut')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Enregistrer l'ouvrage
                </button>
                <a href="{{ route('ouvrages.index') }}" class="btn btn-outline-secondary">
                    Annuler
                </a>

            </form>

        </div>
    </div>

@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Ouvrage;
use Illuminate\Http\Request;

class OuvrageController extends Controller
{
    /**
     * Affiche la liste de tous les ouvrages.
     */
    public function index()
    {
        $ouvrages = Ouvrage::orderBy('created_at', 'desc')->get();

        return view('ouvrages.index', compact('ouvrages'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('ouvrages.create');
    }

    /**
     * Valide et enregistre un nouvel ouvrage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_editeur' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:ouvrages,isbn',
            'nb_exemplaires' => 'required|integer|min:0',
            'statut' => 'required|boolean',
        ], [
            'titre.required' => 'Le titre de l\'ouvrage est obligatoire.',
            'auteur_editeur.required' => 'Le nom de l\'auteur ou de l\'éditeur est obligatoire.',
            'isbn.required' => 'Le code ISBN est obligatoire.',
            'isbn.unique' => 'Ce code ISBN existe déjà dans le catalogue.',
            'isbn.max' => 'Le code ISBN ne doit pas dépasser 20 caractères.',
            'nb_exemplaires.required' => 'Le nombre d\'exemplaires est obligatoire.',
            'nb_exemplaires.integer' => 'Le nombre d\'exemplaires doit être un nombre entier.',
            'nb_exemplaires.min' => 'Le nombre d\'exemplaires ne peut pas être négatif.',
            'statut.required' => 'Le statut est obligatoire.',
        ]);

        Ouvrage::create($validated);

        return redirect()->route('ouvrages.index')
            ->with('success', 'Ouvrage ajouté avec succès au catalogue.');
    }

    /**
     * Affiche le détail d'un ouvrage (optionnel, non requis explicitement mais bonne pratique).
     */
    public function show(Ouvrage $ouvrage)
    {
        return view('ouvrages.show', compact('ouvrage'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Ouvrage $ouvrage)
    {
        return view('ouvrages.edit', compact('ouvrage'));
    }

    /**
     * Valide et met à jour un ouvrage existant.
     */
    public function update(Request $request, Ouvrage $ouvrage)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_editeur' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:ouvrages,isbn,' . $ouvrage->id,
            'nb_exemplaires' => 'required|integer|min:0',
            'statut' => 'required|boolean',
        ], [
            'titre.required' => 'Le titre de l\'ouvrage est obligatoire.',
            'auteur_editeur.required' => 'Le nom de l\'auteur ou de l\'éditeur est obligatoire.',
            'isbn.required' => 'Le code ISBN est obligatoire.',
            'isbn.unique' => 'Ce code ISBN existe déjà dans le catalogue.',
            'isbn.max' => 'Le code ISBN ne doit pas dépasser 20 caractères.',
            'nb_exemplaires.required' => 'Le nombre d\'exemplaires est obligatoire.',
            'nb_exemplaires.integer' => 'Le nombre d\'exemplaires doit être un nombre entier.',
            'nb_exemplaires.min' => 'Le nombre d\'exemplaires ne peut pas être négatif.',
            'statut.required' => 'Le statut est obligatoire.',
        ]);

        $ouvrage->update($validated);

        return redirect()->route('ouvrages.index')
            ->with('success', 'Ouvrage modifié avec succès.');
    }

    /**
     * Supprime un ouvrage.
     */
    public function destroy(Ouvrage $ouvrage)
    {
        try {
            $ouvrage->delete();
            return redirect()->route('ouvrages.index')
                ->with('success', 'Ouvrage supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('ouvrages.index')
                ->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}
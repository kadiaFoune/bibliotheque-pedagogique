<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur_editeur',
        'isbn',
        'nb_exemplaires',
        'statut',
    ];

    protected $casts = [
        'statut' => 'boolean',
        'nb_exemplaires' => 'integer',
    ];
}
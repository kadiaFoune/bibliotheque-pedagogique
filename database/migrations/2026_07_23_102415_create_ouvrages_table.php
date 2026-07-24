<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->string('auteur_editeur', 255);
            $table->string('isbn', 20)->unique();
            $table->integer('nb_exemplaires')->unsigned()->default(0);
            $table->boolean('statut')->default(true); // true = Disponible, false = Épuisé
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ouvrages');
    }
};
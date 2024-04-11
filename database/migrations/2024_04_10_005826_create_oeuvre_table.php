<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Oeuvre', function (Blueprint $table) {
            $table->id('idOeuvre');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('artiste_id');
            $table->string('nom');
            $table->string('description');
            $table->date('annee')->nullable();
            $table->foreign('categorie_id')->references('idCategorie')->on('Categorie');
            $table->foreign('artiste_id')->references('idArtiste')->on('Artiste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Oeuvre');
    }
};

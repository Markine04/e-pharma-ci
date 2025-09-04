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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('code_barre')->unique()->nullable();
            $table->string('nom');
            $table->string('principe_actif');
            $table->string('dosage')->nullable();
            $table->string('forme_galenique')->comment('-- Comprimé, sirop, injection, etc.')->nullable();
            $table->integer('categorie_id');
            $table->integer('fournisseur_id');
            $table->decimal('prix_achat', 10, 2);
            $table->decimal('prix_vente', 10, 2);
            $table->decimal('taux_tva', 5, 2)->default(0.0);
            $table->boolean('besoin_ordonnance')->default(false);
            $table->string('conditionnement')->comment('-- Boîte de 30, flacon de 100ml, etc.')->nullable();
            $table->string('temperature_conservation')->comment('-- Ambiante, réfrigéré, etc.')->nullable();
            $table->integer('user_enreg');
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};

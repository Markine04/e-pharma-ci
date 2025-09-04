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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_ticket')->unique()->nullable();
            $table->datetime('date_vente');
            $table->decimal('montant_total', 10, 2);
            $table->decimal('montant_tva', 10, 2)->default(0.0);
            $table->string('emplacement')->comment('-- Espèces, Carte, Chèque')->nullable();
            $table->integer('mode_paiement')->comment('1: espèces, 2: carte, 3: chèque')->nullable();
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
        Schema::dropIfExists('ventes');
    }
};

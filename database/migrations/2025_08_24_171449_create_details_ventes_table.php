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
        Schema::create('details_ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('vente_id');
            $table->integer('medicament_id');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2)->nullable();
            $table->decimal('sous_total', 10, 2)->nullable();
            $table->string('lot_number', 100)->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_ventes');
    }
};

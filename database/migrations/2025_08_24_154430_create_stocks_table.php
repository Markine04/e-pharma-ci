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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('medicament_id')->nullable();
            $table->integer('quantite')->default(0);
            $table->string('lot_number')->nullable();
            $table->date('date_expiration')->nullable();
            $table->date('date_reception')->nullable();
            $table->string('emplacement')->comment('-- Rayon A, Réfrigérateur, etc.')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};

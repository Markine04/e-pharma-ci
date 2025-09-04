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
        Schema::create('alertes_expirations', function (Blueprint $table) {
            $table->id();
            $table->integer('medicament_id');
            $table->string('lot_number', 100)->nullable();
            $table->date('date_expiration');
            $table->integer('jours_restants')->nullable();
            $table->string('niveau_alerte', 50)->comment('-- Critique, Warning, Info')->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertes_expirations');
    }
};

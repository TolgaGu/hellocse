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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrateur_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('image');
            $table->enum('statut', ['inactif', 'en attente', 'actif']);
            $table->timestamps();
    
            $table->foreign('administrateur_id')->references('id')->on('administrateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};

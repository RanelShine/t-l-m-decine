<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();

            // Clés étrangères
            $table->foreignId('patient_id')
                  ->constrained()
                  ->cascadeOnDelete();
                  $table->foreignId('medecin_id')
                  ->nullable()  
                  ->constrained() 
                  ->cascadeOnDelete();  
            
            // Date et heure du rendez-vous
            $table->date('date_rendezvous')
                  ->comment('Date du rendez-vous');
            $table->time('heure')
                  ->comment('Heure du rendez-vous');
            
            // Optionnel : localisation et motif
            $table->string('localisation')
                  ->nullable()
                  ->comment('Lieu de residence du patient');
            $table->text('motif')
                  ->nullable()
                  ->comment('Raison ou motif de la consultation');
            
            // Statut du rendez-vous
            $table->enum('status', [
                'confirmé',
                'annulé',
                'en_attente',
                'terminé',
                'absent',
                'affecté',
            ])->default('en_attente');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez_vouses');
    }
};

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
        Schema::create('dossier_medicales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->decimal('poids', 5, 2)->comment('Poids en kg');
            $table->decimal('taille', 5, 2)->comment('Taille en cm');
            $table->string('groupe_sanguin', 3)->nullable()->comment('Ex: A+, O-, etc.');
            $table->json('antecedents_medicaux')->nullable()->comment('Antécédents médicaux structurés');
            $table->json('allergies')->nullable()->comment('Liste des allergies médicamenteuses/alimentaires');
            $table->json('vaccinations')->nullable()->comment('Carnet de vaccination');
            $table->json('traitement_en_cours')->nullable()->comment('Médicaments actuels avec posologie');
            $table->longText('contenu')->nullable()->comment('Notes médicales libres');
            $table->foreignId('dernier_editeur_id')->nullable()->constrained('users')->comment('Dernier professionnel ayant modifié le dossier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_medicales');
    }
};

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
        Schema::create('dossiermedicale_medecin', function (Blueprint $table) {
            $table->foreignId('dossier_medicales_id')->constrained();
            $table->foreignId('medecin_id')->constrained();
            $table->primary(['dossier_medicales_id','medecin_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiermedicale_medecin');
    }
};

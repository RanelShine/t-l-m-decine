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
    Schema::table('rendezvous', function (Blueprint $table) {
        $table->string('zoom_link')->nullable()->after('status');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            //
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sasaran_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriks_id')->nullable();
            $table->foreignId('sasaran_id')->nullable();
            $table->string('indikator_keberhasilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_pegawais');
    }
};
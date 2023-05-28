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
        Schema::create('matriks_skps', function (Blueprint $table) {
            $table->id();
            $table->string('hasil_kinerja');
            $table->string('feedback')->nullable();
            $table->string('penilaian')->nullable();
            $table->foreignId('matriks_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks_skps');
    }
};

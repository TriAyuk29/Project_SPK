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
        Schema::create('matriks', function (Blueprint $table) {
            $table->id();
            $table->integer('periode');
            $table->integer('tahun');
            $table->integer('indikator_kinerja');
            $table->string('index_capaian');
            $table->foreignId('pegawai_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks');
    }
};
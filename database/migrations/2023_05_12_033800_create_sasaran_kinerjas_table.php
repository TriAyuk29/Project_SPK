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
        Schema::create('sasaran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('sasaran_kinerja');
            $table->string('jabatan')->nullable();
            $table->foreignId('matriks_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_kinerjas');
    }
};
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
        Schema::create('input_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pangkat/golongan');
            $table->string('unit_kerja');
            $table->string('nama_pp');
            $table->string('nama_app');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_profiles');
    }
};
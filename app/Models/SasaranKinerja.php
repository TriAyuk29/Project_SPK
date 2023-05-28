<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranKinerja extends Model
{
    use HasFactory;

    // protected $table = "sasaran_kinerja";

    protected $fillable = [
        "sasaran_kinerja",
        "jabatan",
        "matriks",
    ];

    public function sasaranPegawai()
    {
        return $this->hasMany(SasaranPegawai::class);
    }
}
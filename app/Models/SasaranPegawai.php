<?php

namespace App\Models;

use App\Models\SasaranKinerja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SasaranPegawai extends Model
{
    use HasFactory;

    protected $fillable = [

        "matriks_id",
        "sasaran_id",
        "indikator_keberhasilan",
    ];

    public function sasaran()
    {
        return $this->belongsTo(SasaranKinerja::class);
    }

    public function matriks()
    {
        return $this->belongsTo(Matriks::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }
}
<?php

namespace App\Models;

use App\Models\DataPegawai;
use App\Models\SasaranPegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matriks extends Model
{
    use HasFactory;

    protected $fillable = [
        "periode",
        "tahun",
        "indikator_kinerja",
        "index_capaian",
        "pegawai_id"
    ];

    public function sasaran()
    {
        return $this->hasMany(SasaranPegawai::class);
    }

    public function data_pegawai()
    {
        return $this->belongsTo(DataPegawai::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputProfile extends Model
{
    use HasFactory;

    protected $table = 'data_pegawais';

    protected $fillable = [
        "nama",
        "pengkat/golongan",
        "unit_kerja",
        "nama_pp",
        "nama_app",
    ];

    public function data_pegawai()
    {
        return $this->belongsTo(DataPegawai::class);
    }
}
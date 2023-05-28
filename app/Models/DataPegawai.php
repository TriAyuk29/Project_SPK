<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DataPegawai extends Model
{
    use HasFactory;

    public function matriks()
    {
        return $this->hasMany(Matriks::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'nama',
        'nip',
        'pangkat/golongan',
        'jabatan',
        'unit_kerja',
        'nama_pp',
        'nama_app',
    ];
}
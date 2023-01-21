<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;
use App\Models\Karyawan;
use App\Models\Registrasis;
use App\Models\Icd;

class Rekammedises extends Model
{
    use HasFactory;
    protected $table = 'rekammedises';
    protected $fillable = [
        'pasiens_id',
        'karyawans_id',
        'registrasis_id',
        'kode_icd',
        'keluhan',
        'tanggal_dibuat',
        'tensi',
        'alergi',
        'hasil_lab'
    ];
    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'pasiens_id');
    }

    public function karyawans()
    {
        return $this->belongsTo(Karyawan::class, 'karyawans_id');
    }

    public function registrasis()
    {
        return $this->belongsTo(Registrasis::class, 'registrasis_id');
    }

    public function icd()
    {
        return $this->belongsTo(Icd::class, 'kode_icd');
    }

}

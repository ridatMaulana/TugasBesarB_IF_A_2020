<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;
use App\Models\Karyawan;
use App\Models\Obat;
use App\Models\Tindakan;
use App\Models\Rekammedises;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'pasiens_id', 'karyawans_id', 'obats_id', 'tindakans_id', 'rekammedises_id', 'no_antrian', 'tanggal_transaksi',	'total_biaya',
    ];
    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'pasiens_id');
    }

    public function karyawans()
    {
        return $this->belongsTo(Karyawan::class, 'karyawans_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obats_id');
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'tindakans_id');
    }
    public function rekammedises()
    {
        return $this->belongsTo(Rekammedises::class, 'rekammedises_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasis extends Model
{
    use HasFactory;
    protected $table = "registrasis";
    protected $fillable = [
        'pasiens_id',
        'no_nota',
        'no_antrian',
        'tanggal_registrasi'
    ];
    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'pasiens_id');
    }
}

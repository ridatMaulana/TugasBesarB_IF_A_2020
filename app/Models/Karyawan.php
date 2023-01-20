<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spesialis;

class Karyawan extends Model
{
    use HasFactory;
    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'spesialis_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Icd;

class Obat extends Model
{
    use HasFactory;


    public function icd()
    {
        return $this->belongsTo(Icd::class, 'icds_id');
    }
}

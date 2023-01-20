<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Icd;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = [
        'icds_id',
        'nama_obat',
        'harga_obat',
    ];

    public function icd()
    {
        return $this->belongsTo(Icd::class, 'icds_id');
    }

    public static function getDataObats()
    {
        $obats = Obat::all();
    
        $obats_filter = [];
    
        $no = 1;
        for ($i=0; $i < $obats->count(); $i++) {
            $obats_filter[$i]['no'] = $no++;
            $obats_filter[$i]['icds_id'] = $obats[$i]->idcs_id;
            $obats_filter[$i]['nama_obat'] = $obats[$i]->nama_obat;
            $obats_filter[$i]['harga_obat'] = $obats[$i]->harga_obat;
           
        return $obats_filter;
    }
}
}

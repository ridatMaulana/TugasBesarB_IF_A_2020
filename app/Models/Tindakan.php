<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tindakan',
        'harga_tindakan',
        
    ];

    public static function getDataTindakans()
{
    $tindakans = Tindakan::all();

    $tindakans_filter = [];

    $no = 1;
    for ($i=0; $i < $tindakans->count(); $i++) {
        $pasiens_filter[$i]['no'] = $no++;
        $tindakans_filter[$i]['nama_tindakan'] = $tindakans[$i]->nama;
        $tindakans_filter[$i]['harga_tidakan'] = $tindakans[$i]->nama;
       
    }
    return $tindakans_filter;
}

}

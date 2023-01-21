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
        $tindakans_filter[$i]['no'] = $no++;
        $tindakans_filter[$i]['nama_tindakan'] = $tindakans[$i]->nama_tindakan;
        $tindakans_filter[$i]['harga_tindakan'] = $tindakans[$i]->harga_tindakan;

    }
    return $tindakans_filter;
}

}

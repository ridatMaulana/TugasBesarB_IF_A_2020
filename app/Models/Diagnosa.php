<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_diagnosa',
      
    ];

    public static function getDataDiagnosas()
{
    $diagnosas = Diagnosa::all();

    $diagnosas_filter = [];

    $no = 1;
    for ($i=0; $i < $pasiens->count(); $i++) {
        $diagnosas_filter[$i]['no'] = $no++;
        $diagnosas_filter[$i]['nama_diagnosa'] = $diagnosas[$i]->nama;
        
    }
    return $diagnosas_filter;
}

}

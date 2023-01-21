<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_diagnosa',

    ];

    public static function getDataDiagnosas()
    {
        $diagnosas = Icd::all();

        $diagnosas_filter = [];

        $no = 1;
        for ($i=0; $i < $diagnosas->count(); $i++) {
            $diagnosas_filter[$i]['no'] = $no++;
            $diagnosas_filter[$i]['nama_diagnosa'] = $diagnosas[$i]->nama_diagnosa;

        }
        return $diagnosas_filter;
    }
}

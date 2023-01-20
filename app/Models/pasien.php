<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
        'agama',
        'nama_ibu',
        'jenis_kelamin',
        'tanggal_daftar',
    ];

    public static function getDataPasiens()
{
    $pasiens = Pasien::all();

    $pasiens_filter = [];

    $no = 1;
    for ($i=0; $i < $books->count(); $i++) {
        $pasiens_filter[$i]['no'] = $no++;
        $pasiens_filter[$i]['nama'] = $books[$i]->nama;
        $pasiens_filter[$i]['tanggal_lahir'] = $books[$i]->tanggal_lahir;
        $pasiens_filter[$i]['alamat'] = $books[$i]->alamat;
        $pasiens_filter[$i]['agama'] = $books[$i]->agama;
        $pasiens_filter[$i]['nama_ibu'] = $books[$i]->nama_ibu;
        $pasiens_filter[$i]['jenis_kelamin'] = $books[$i]->jenis_kelamin;
        $pasiens_filter[$i]['tanggal_daftar'] = $books[$i]->tanggal_daftar;
    }
    return $pasiens_filter;
}

}

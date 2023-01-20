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
    for ($i=0; $i < $pasiens->count(); $i++) {
        $pasiens_filter[$i]['no'] = $no++;
        $pasiens_filter[$i]['nama'] = $pasiens[$i]->nama;
        $pasiens_filter[$i]['tanggal_lahir'] = $pasiens[$i]->tanggal_lahir;
        $pasiens_filter[$i]['alamat'] = $pasiens[$i]->alamat;
        $pasiens_filter[$i]['agama'] = $pasiens[$i]->agama;
        $pasiens_filter[$i]['nama_ibu'] = $pasiens[$i]->nama_ibu;
        $pasiens_filter[$i]['jenis_kelamin'] = $pasiens[$i]->jenis_kelamin;
        $pasiens_filter[$i]['tanggal_daftar'] = $pasiens[$i]->tanggal_daftar;
    }
    return $pasiens_filter;
}

}

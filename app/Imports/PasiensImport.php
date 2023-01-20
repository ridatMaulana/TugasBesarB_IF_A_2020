<?php

namespace App\Imports;

use App\Models\pasien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PasiensImport implements WithHeadingRow,ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pasien([
            //
            'nama'=> $row['nama'],
            'tanggal_lahir'=> $row['tanggal_lahir'],
            'alamat'=> $row['alamat'],
            'agama'=> $row['agama'],
            'nama_ibu'=> $row['nama_ibu'],
            'jenis_kelamin'=> $row['jenis_kelamin'],
            'tanggal_daftar'=> $row['tanggal_daftar'],
        ]);
    }
}

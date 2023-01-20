<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PasiensExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        return Pasien::getDataPasiens();
    }

    public function headings():array
    {
        return [
        'no',
        'nama',
        'tanggal_lahir',
        'alamat',
        'agama',
        'nama_ibu',
        'jenis_kelamin',
        'tanggal_daftar',
        ];
    }
}

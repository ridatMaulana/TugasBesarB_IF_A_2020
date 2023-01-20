<?php

namespace App\Exports;

use App\Models\Book;
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
        return Book::getDataPasiens();
    }

    public function headings():array
    {
        return [
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

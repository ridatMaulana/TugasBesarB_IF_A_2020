<?php

namespace App\Exports;

use App\Models\Obat;
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
        return Pasien::getDataObats();
    }

    public function headings():array
    {
        return [
        'no',
        'icds_id',
        'nama_obat',
        'harga_obat',
        
        ];
    }
}

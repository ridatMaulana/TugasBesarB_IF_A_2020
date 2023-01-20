<?php

namespace App\Exports;

use App\Models\Tindakan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TindakansExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        return Pasien::getDataTindakans();
    }

    public function headings():array
    {
        return [
        'no',
        'nama_tindakan',
        'harga_tindakan',
       
        ];
    }
}

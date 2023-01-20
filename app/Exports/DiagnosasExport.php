<?php

namespace App\Exports;

use App\Models\Icd;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DiagnosasExport implements  FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {
        return Icd::getDataDiagnosas();
    }

    public function headings():array
    {
        return [
        'no',
        'nama_diagnosa',
        ];
    }

}

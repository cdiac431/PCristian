<?php

namespace App\Exports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmpresesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empresa::all();
    }

    public function headings(): array
    {
        return [
            'nom','localitat','direccio',
            'telefon','cif','email'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Instituto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class institutsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Instituto::all();
    }
    public function headings(): array
    {
        return [
            'nom','localitat','direccio',
            'telefon','cif','email'
        ];
    }
}

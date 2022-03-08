<?php

namespace App\Imports;

use App\Instituto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class institutsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return Instituto
     */
    public function model(array $row)
    {
        return new Instituto([
            'nom' =>  $row['nom'],
            'localitat' =>  $row['localitat'],
            'direccio'=> $row['direccio'],
            'telefon'=> $row['cif'],
            'email'=> $row['email'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}

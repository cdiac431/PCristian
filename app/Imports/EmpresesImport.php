<?php

namespace App\Imports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class EmpresesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return Empresa
     */
    public function model(array $row)
    {
        return new Empresa([
                'nom' =>  $row['nom'],
                'localitat' =>  $row['localitat'],
                'direccio'=> $row['direccio'],
                'telefon'=> $row['telefon'],
                'cif'=> $row['cif'],
                'email'=> $row['email'],
            ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}

<?php

namespace App\Imports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Usuario([
            'id_roles' =>  $row['id_rol'],
            'nom' =>  $row['nom'],
            'cognom'=> $row['cognom'],
            'segon_cognom'=> $row['segon_cognom'],
            'dni'=> $row['dni'],
            'password'=> $row['password'],
            'user_name'=> $row['username'],
            'email'=> $row['email'],
            'telefon'=> $row['telefon'],
            'data_naixement'=> $row['data_naixement']
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}

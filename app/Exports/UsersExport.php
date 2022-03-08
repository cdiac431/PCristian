<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usuario::all();
    }
    public function headings(): array
    {
        return ["id_rol", "nom", "cognom","segon_cognom","dni","password",
                "username", "email","telefon", "data_naixement"];
    }
}

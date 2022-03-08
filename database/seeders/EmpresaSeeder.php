<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('empresas')->insert([
            'nom' => 'Delinternet',
            'localitat' => 'Deltebre',
            'direccio' => 'Carrer Comerç 1',
            'telefon' => '877990500',
            'cif' => '982192488',
            'email' => 'delinternet@delinternet.com',
            'estat' => 'actiu',
            'lat' => '40.71663157313784',
            'lon' => '0.735295776926125',
        ]);

        DB::table('empresas')->insert([
            'nom' => 'Eports',
            'localitat' => 'Tortosa',
            'direccio' => 'Plaça Alfons XII 7',
            'telefon' => '977588667',
            'cif' => '829142684',
            'email' => 'eports@eports.com',
            'estat' => 'actiu',
            'lat' => '40.80942753168691',
            'lon' => '0.521443584192423',
        ]);

        Empresa::factory(50)->create();
    }
}

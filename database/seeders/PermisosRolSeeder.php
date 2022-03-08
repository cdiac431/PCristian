<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos_rols')->insert([
            'id_permis' => 1,
            'id_rol' => 1,
            'estat' => 'actiu'
        ]);

        DB::table('permisos_rols')->insert([
            'id_permis' => 2,
            'id_rol' => 2,
            'estat' => 'actiu'
        ]);

        DB::table('permisos_rols')->insert([
            'id_permis' => 3,
            'id_rol' => 3,
            'estat' => 'actiu'
        ]);

        DB::table('permisos_rols')->insert([
            'id_permis' => 4,
            'id_rol' => 4,
            'estat' => 'actiu'
        ]);

        DB::table('permisos_rols')->insert([
            'id_permis' => 5,
            'id_rol' => 5,
            'estat' => 'actiu'
        ]);
       
    }
}

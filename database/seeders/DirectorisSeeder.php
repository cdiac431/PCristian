<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DirectorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        DB::table('directoris')->insert([
            'nom' => 'Personal',
            'id_usuari' => 1,
            'id_directori' => null
        ]);

        DB::table('directoris')->insert([
            'nom' => 'Dir de prova',
            'id_usuari' => 1,
            'id_directori' => 1
        ]);

        DB::table('directoris')->insert([
            'nom' => 'Subdir de prova',
            'id_usuari' => 1,
            'id_directori' => 2
        ]);

        DB::table('directoris')->insert([
            'nom' => 'Projecte',
            'id_usuari' => 1,
            'id_projecte' => 10,
            'id_directori' => null
        ]);

        DB::table('directoris')->insert([
            'nom' => 'Projecte dir',
            'id_usuari' => null,
            'id_projecte' => 10,
            'id_directori' => 5
        ]);
    }
}

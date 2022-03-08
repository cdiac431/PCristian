<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FitxersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        DB::table('fitxers')->insert([
            'nom' => 'Ubuntu 20.04 ISO',
            'extensio' => '.iso',
            'tamany' => '2Gb',
            'id_directori' => 1
        ]);

        DB::table('fitxers')->insert([
            'nom' => 'Xuletes Examen',
            'extensio' => '.txt',
            'tamany' => '10Mb',
            'id_directori' => 2
        ]);

        DB::table('fitxers')->insert([
            'nom' => 'Xuletes Examen 2',
            'extensio' => '.txt',
            'tamany' => '10Mb',
            'id_directori' => 2
        ]);

        DB::table('fitxers')->insert([
            'nom' => 'Xuletes Examen 3',
            'extensio' => '.txt',
            'tamany' => '10Mb',
            'id_directori' => 4
        ]);

        DB::table('fitxers')->insert([
            'nom' => 'Xuletes Examen 4',
            'extensio' => '.txt',
            'tamany' => '10Mb',
            'id_directori' => 5
        ]);
    }
}

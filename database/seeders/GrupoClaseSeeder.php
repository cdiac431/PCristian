<?php

namespace Database\Seeders;

use App\Models\GrupoClase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $profesNum;
    public function run()
    {
      DB::table('grupo_clases')->insert([
          'id_institut' => 1,
          'id_tutor' => 1,
          'nom' => 'DAW2',
          'estat' => 'actiu',
      ]);


      GrupoClase::factory(10)->create();
    }
}

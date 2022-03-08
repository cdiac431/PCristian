<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();

      DB::table('incidencias')->insert([
          'id_usuari' => 1 ,
          'estat_incidencia' => 'Enviat',
          'nom' => 'Switch no operatiu',
          'descripcio' => 'Ha explotat un switch del passillo principal',
          'estat' => 'actiu',
      ]);

      DB::table('incidencias')->insert([
          'id_usuari' => 2,
          'estat_incidencia' => 'Enviat',
          'nom' => 'Porta trencada',
          'descripcio' => 'Els alumnes de segon no poden fer login a la web',
          'estat' => 'actiu',
      ]);

      Incidencia::factory(30)->create();
    }
}

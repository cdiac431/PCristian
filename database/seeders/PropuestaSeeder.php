<?php

namespace Database\Seeders;

use App\Models\Propuesta;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PropuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();

      DB::table('propuestas')->insert([
          'id_empresa' => 1,
          'id_categoria' => 1,
          'id_responsable' => 2,
          'nom' => 'Hosting',
          'descripcio' => 'Ens oferim a fer Hosting amb un institut de la zona.',
          'requeriments' => 'Experiència configurant un servidor web',
          'estat_proposta' => 'Sol·licitada',
          'estat' => 'actiu',
          'estimacio_economica' => 'Pensem que serà un projecte que rondarà els 9000€',
      ]);

      Propuesta::factory(10)->create();

    }
}

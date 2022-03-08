<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();
      DB::table('proyectos')->insert([
          'id_proposta' => 1,
          'nom_projecte' => 'Hosting Delinternet',
          'estat' => 'actiu',
      ]);

      Proyecto::factory(10)->create();
    }
}

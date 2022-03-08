<?php

namespace Database\Seeders;

use App\Models\LiniaPresupuesto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiniaPresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('linia_presupuestos')->insert([
          'id_pressupost' => 1,
          'nom_cost' => 'Router',
          'preu_cost' => '50€',
          'quantitat_cost' => '3',
          'total_linia_producte' => '500',
          'iva' => '21',
          'estat_proposta' => 'Acceptat',
          'estat' => 'actiu',
      ]);

      LiniaPresupuesto::factory(10)->create();

    }
}

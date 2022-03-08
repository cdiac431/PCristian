<?php

namespace Database\Seeders;

use App\Models\Presupuesto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presupuestos')->insert([
            'id_projecte' => 1,
            'estat' => 'actiu',
            
          ]); 

          Presupuesto::factory(10)->create();
    }
}

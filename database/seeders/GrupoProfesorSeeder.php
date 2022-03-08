<?php

namespace Database\Seeders;

use App\Models\GrupoProfesor;
use App\Models\GrupoClase;
use App\Models\Profesor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $profesNum;
    public function run()
    {
        DB::table('grupo_profesors')->insert([
            'id_grup' => 1,
            'id_professor' => 1,
            'estat' => 'actiu',
            
          ]);

        $prof = GrupoClase::all();
        foreach($prof as $profe) {
            
          $this->profesNum++ ;
        }
          GrupoProfesor::factory($this->profesNum)->create();
    }
}

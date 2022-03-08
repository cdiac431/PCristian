<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $alumNum;
    public function run()
    {
        
        $user = User::all();
        foreach($user as $usuari) {
            if($usuari->id_roles ==4){
                $this->alumNum++ ;
            }
        }

          Alumno::factory($this->alumNum)->create();
    }
}

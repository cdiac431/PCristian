<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $empNum;
    public function run()
    {


        $user = User::all();
        foreach($user as $usuari) {
            if($usuari->id_roles ==6){
                $this->empNum++ ;
            }
        }


        Empleado::factory($this->empNum)->create();
      
    }
}

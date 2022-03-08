<?php

namespace Database\Seeders;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfesorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $profesNum;
    public function run()
    {
        $user = User::all();
        foreach($user as $usuari) {
            if($usuari->id_roles ==5){
                $this->profesNum++ ;
            }
        }
        

          Profesor::factory($this->profesNum)->create();
    }
}

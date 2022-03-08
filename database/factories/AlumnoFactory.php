<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\User;
use App\Models\GrupoClase;
use App\Models\Instituto;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;
    protected $mode2;
    protected $alum;
    protected $cont=-1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->mode2 = User::all();
        $i=0;
        foreach($this->mode2 as $user){
            
            if($user->id_roles==4){
            
                $this->alum[$i]= $user->id;
                $i++;
            }
        }
        $this->cont++;

       

        return [
            'user_id' => $this->alum[$this->cont],
            'id_institut' => Instituto::all()->random()->id,
            'id_grup_tutoria'=>GrupoClase::all()->random()->id
        ];
    }
}

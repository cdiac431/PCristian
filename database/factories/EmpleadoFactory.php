<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empleado::class;
    protected $mode2;
    protected $emp;
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
            
            if($user->id_roles==6 || $user->id_roles==3){
            
                $this->emp[$i]= $user->id;
                $i++;
            }
        }
        $this->cont++;
        return [

            'id_empresa' => rand(1,21),
            'user_id' => $this->emp[$this->cont],

        ];
    }
}

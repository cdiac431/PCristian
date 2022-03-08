<?php

namespace Database\Factories;

use App\Models\Profesor;
use App\Models\User;
use App\Models\Instituto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profesor::class;
    protected $mode2;
    protected $profes;
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
            
            if($user->id_roles==5 || $user->id_roles==2){
            
                $this->profes[$i]= $user->id;
                $i++;
            }
        }
        $this->cont++;
        
        return [
            'user_id' => $this->profes[$this->cont],
            'id_institut' => Instituto::all()->random()->id,

        ];
        
    }
}

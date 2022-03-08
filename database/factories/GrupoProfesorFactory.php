<?php

namespace Database\Factories;

use App\Models\GrupoProfesor;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoProfesorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrupoProfesor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $mode2;
    public function definition()
    {
        $this->mode2 = Profesor::all();
        $i=-1;
        foreach($this->mode2 as $user){
            $i++;
        }
        return [
            'id_grup' => rand(1,9),
            'id_professor' => rand(1,$i)
        ];
    }
}

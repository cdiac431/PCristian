<?php

namespace Database\Factories;

use App\Models\GrupoClase;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoClaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrupoClase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $mode2;
    public function definition()
    {
        $this->mode2 = Profesor::all();
        $i=0;
        foreach($this->mode2 as $user){
            $i++;
        }
        return [
            'id_institut' => rand(1,15),
            'id_tutor' => rand(1,$i),
            'nom' => $this->faker->word
        ];
    }
}

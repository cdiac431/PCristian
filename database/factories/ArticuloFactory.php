<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_wiki' => rand(1,11),
            'id_usuari' => rand(1,56),
            'nom' => $this->faker->sentence(),
            'cos' => $this->faker->paragraph()
        ];
    }
}

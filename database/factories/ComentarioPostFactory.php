<?php

namespace Database\Factories;

use App\Models\ComentarioPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComentarioPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_post' => rand(1,11),
            'id_usuari' => rand(1,56),
            'contingut' => $this->faker->paragraph()
        ];
    }
}

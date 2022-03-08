<?php

namespace Database\Factories;

use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incidencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuari'=> rand(1,56),
            'estat_incidencia' => $this->faker->randomElement(['Enviat', 'En Proces', 'Resolt']),
            'nom' => $this->faker->sentence(),
            'descripcio' => $this->faker->paragraph()
        ];
    }
}

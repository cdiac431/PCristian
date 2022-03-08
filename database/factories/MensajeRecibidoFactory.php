<?php

namespace Database\Factories;

use App\Models\MensajeRecibido;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeRecibidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MensajeRecibido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'remitent' => $this->faker->safeEmail,
            'destinatari' => $this->faker->safeEmail,
            'assumpte' => $this->faker->sentence(),
            'cos' => $this->faker->paragraph()
        ];
    }
}

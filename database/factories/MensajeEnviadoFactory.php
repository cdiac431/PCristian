<?php

namespace Database\Factories;

use App\Models\MensajeEnviado;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeEnviadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MensajeEnviado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'remitent' => $this->faker->safeEmail,
            'assumpte' => $this->faker->sentence(),
            'cos' => $this->faker->paragraph()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\LiniaPresupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiniaPresupuestoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LiniaPresupuesto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pressupost' => rand(1,10),
            'nom_cost' => $this->faker->word,
            'preu_cost' => $this->faker->numberBetween(0,500),
            'quantitat_cost' => $this->faker->numberBetween(1,50),
            'total_linia_producte' => $this->faker->numberBetween(1,999),
            'iva' => $this->faker->numberBetween(1,30)
        ];
    }
}

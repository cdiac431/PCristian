<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nom' => $this->faker->company,
            'localitat' => $this->faker->city, 
            'direccio' => $this->faker->streetAddress,
            'telefon' => $this->faker->phoneNumber,
            'cif' => $this->faker->creditCardNumber,
            'email' => $this->faker->safeEmail,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_roles' => rand(1,6),
            'nom' => $this->faker->firstName,
            'cognom' => $this->faker->lastName,
            'segon_cognom' => $this->faker->lastName,
            'dni' => $this->faker->dni,
            'user_name' => $this->faker->userName,
            'password' => Hash::make('hola'),
            'email' => $this->faker->safeEmail,
            'telefon' => $this->faker->phoneNumber,
            'data_naixement' => $this->faker->date
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Propuesta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propuesta::class;
    protected $number=-1;

    protected $mode2;
    protected $profes;
    protected $cont=-1;
    protected $valorEntitat;
    protected $valorInstitut;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imatgeProposta=['imatge1.jpg', 'imatge2.jpg', 'imatge3.jpg', 'imatge4.jpg', 'imatge5.jpg', 'imatge6.jpg'];

        $this->mode2 = User::all();
        $i=0;
        foreach($this->mode2 as $user){

            if($user->id_roles==2 || $user->id_roles==3){

                $this->profes[$i]= $user->id;
                $i++;
            }
        }
        $this->cont++;

        if($this->number==count($imatgeProposta)-1){
            $this->number=-1;
        }
        $this->number ++;
        if($this->number % 2 == 0){
          $valorEntitat = rand(1,50);
          $valorInstitut = null;
        }
        else {
          $valorEntitat = null;
          $valorInstitut = rand(1,9);
        }



        return [
            'id_empresa' => $valorEntitat,
            'id_institut' => $valorInstitut,
            'id_categoria' => rand(1,15),
            'id_responsable'=> $this->profes[$this->cont],
            'nom' => $this->faker->sentence(),
            'descripcio' => $this->faker->paragraph(),
            'requeriments' => $this->faker->paragraph(),
            'ruta_imatge' => $imatgeProposta[$this->number],
            'estat_proposta' => $this->faker->randomElement(['Disponible', 'Sol·licitada', 'Assignada']),
            'estimacio_economica' => 'Pensem que serà un projecte que rondarà els 9000€',

        ];
    }
}

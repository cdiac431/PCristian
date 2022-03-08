<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
        'nom' => 'Comerç',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb el comerç. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'APESID',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb APESID. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Carrosseria',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb la carrosseria. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Electromecànica',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb la electromecànica. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Administració',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb l\'administració. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Electricitat',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb la electricitat. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Finances',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb les finances. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Automoció',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb l\'automoció. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Educació Infantil',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb l\'educació infantil. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Informatica',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb la informàtica. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Màrketing',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb el màrketing. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Disseny',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb el disseny. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Turisme',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb el turisme. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Hosteleria',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb l\'hosteleria. ',
        'estat' =>'actiu',
      ]);

      DB::table('categorias')->insert([
        'nom' => 'Mecatrònica',
        'descripcio' => 'Aquesta etiqueta serveix per a indicar que a una proposta o un projecte es treballaran coses relacionades amb la mecatrònica. ',
        'estat' =>'actiu',
      ]);
    }
}

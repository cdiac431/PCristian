<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensajes')->insert([
            'id_usuari' => 1,
            'id_xat' => 1,
            'data' => '2020-12-17 17:08:20',
            'estat_missatge' => 'Enviat',
            'contingut' => 'Hola, bona tarde!',
            'estat' => 'actiu',
        ]);

        Mensaje::factory(10)->create();
    }
}

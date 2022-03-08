<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'id_usuari' => 1,
            'contingut' => 'Anwar és un molt bon company',
            'id_article' => 1,
            'estat' => 'actiu',
        ]);

        Comentario::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id_usuari' => 2,
            'titol' =>'Routers Delinternet',
            'entradeta' => 'bla bla bla',
            'contingut' =>'Routers de Delinternet baratitos',
            'estat' =>'actiu',
          ]);
          
          Post::factory(10)->create();
    }
}

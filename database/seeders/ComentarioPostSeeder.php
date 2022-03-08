<?php

namespace Database\Seeders;

use App\Models\ComentarioPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComentarioPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();
      DB::table('comentario_posts')->insert([
          'id_post' => 1,
          'id_usuari' => 1,
          'contingut' => 'Això va que vola!',
          'estat' => 'actiu',
      ]);

      ComentarioPost::factory(10)->create();

    }
}

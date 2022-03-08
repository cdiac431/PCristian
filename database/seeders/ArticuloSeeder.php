<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class ArticuloSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert([
            'id_wiki' => 1,
            'id_usuari' => 1,
            'nom' =>'Delinternet Col·labora INS Montsia',
            'cos' =>'Institut Montsia col·labora amb Delinternet',
            'estat' =>'actiu',
          ]);
          
          Articulo::factory(10)->create();
    }
}

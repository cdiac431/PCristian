<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VersionAnteriorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();
      DB::table('version_anteriors')->insert([
          'id_article' => 1,
          'id_usuari' => 1,
          'nom' => 'Delinternet Col·labora INS Montsià',
          'cos' => 'Institut Montsià col·labora amb Delinternet',
          'estat' => 'actiu',
      ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\MensajeEnviado;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MensajeEnviadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();

      DB::table('mensaje_enviados')->insert([
          'remitent' => 'joelferragut@iesmontsia.org',
          'assumpte' => 'Sprint5',
          'cos' => 'Com trobes que anem?',
          'estat' => 'actiu',
      ]);

      MensajeEnviado::factory(30)->create();
    }
}

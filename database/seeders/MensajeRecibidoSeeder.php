<?php

namespace Database\Seeders;

use App\Models\MensajeRecibido;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MensajeRecibidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dt = Carbon::now();

      DB::table('mensaje_recibidos')->insert([
          'remitent' => 'joaquimbernaltes@iesmontsia.org',
          'destinatari' => 'joelferragut@iesmontsia.org',
          'assumpte' => 'Sprint5',
          'cos' => 'Com trobes que anem?',
          'estat' => 'actiu',
      ]);

      MensajeRecibido::factory(30)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            'nom' => 'Xat Delinternet - INS Montsia',
            'estat' => 'actiu',
            
          ]); 

          Chat::factory(10)->create();
    }
}

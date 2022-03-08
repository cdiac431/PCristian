<?php

namespace Database\Seeders;

use App\Models\Wiki;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WikiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wikis')->insert([
            'id_projecte' => 1,
            'nom' => 'Proces Hosting',
            'estat' => 'actiu',
        ]);

        Wiki::factory(10)->create();
    }
}

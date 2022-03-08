<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class UsuarioSeeder extends Seeder
{
  
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //Joel F  
      User::factory(100)->create();
    }
    
}

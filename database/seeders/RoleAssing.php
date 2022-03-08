<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleAssing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach(Role::all() as $role) {
            foreach($users as $user){
                if($user->id > 6 ){
                    switch ($user->id_roles){
                        case 1:
                            $user->assignRole('Administrador');
                        break;

                        case 2:
                            $user->assignRole('Gestor Institut');
                        break;
                        
                        case 3:
                            $user->assignRole('Gestor Empresa');
                        break;

                        case 4:
                            $user->assignRole('Alumne');
                        break;

                        case 5:
                            $user->assignRole('Professor');
                        break;

                        case 6:
                            $user->assignRole('Empleat');
                        break;
                    }
                    
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=> 'Administrador']);
        $roleGI = Role::create(['name'=> 'Gestor Institut']);
        $roleGE = Role::create(['name'=> 'Gestor Empresa']);
        $roleA = Role::create(['name'=> 'Alumne']);
        $roleP = Role::create(['name'=> 'Professor']);
        $roleE = Role::create(['name'=> 'Empleat']);

        //Permisos per Categoria
        $permissionsCategoriaView = Permission::create(['name' => 'categoria.view'])->assignRole($roleAdmin,$roleGI,$roleGE);
        
        //Permisos per Profes, alumnes i grups per admin i Gestor Interna
        $permissionsGestioInstitutTot = Permission::create(['name' => 'GestioInstitut.tot'])->assignRole($roleAdmin,$roleGI);

        //Permisos per Profes, alumnes i grups per tots els que poden veure
        $permissionsGestioInstitutView = Permission::create(['name' => 'GestioInstitut.view'])->assignRole($roleAdmin,$roleGI,$roleP,$roleA);

        //Permisos per empleats per tots els que ho poden veure
        $permissionsGestioEmpresaView = Permission::create(['name' => 'GestioEmpresa.view'])->assignRole($roleAdmin,$roleGE,$roleE);

        //Permisos per empleats per admin i Gestor Empresa
        $permissionsGestioEmpresaTopView = Permission::create(['name' => 'GestioEmpresaTop.view'])->assignRole($roleAdmin,$roleGE);

        //Permisos per propostes
        $permissionsProposta = Permission::create(['name' => 'propostes.top'])->assignRole($roleAdmin,$roleGE, $roleGI);

        // $permissions1 = Permission::create(['name' => 'management.incidencia']);

        // $permissions1 = Permission::create(['name' => 'management.categoria']);

        $user =  User::create([
            'id_roles' => 1,
            'nom' => 'Joel',
            'cognom' => 'Ferragut',
            'segon_cognom' =>'Garcia',
            'dni' =>'67851613B',
            'user_name' =>'joelferragut',
            'password' => Hash::make('joelferragut'),
            'email' =>'joelferragut@iesmontsia.org',
            'telefon' =>'693859056',
            'data_naixement' =>Carbon::create('1999', '03', '14'),
            'estat' =>'actiu',
          ])->assignRole('Administrador');

          $user2 =  User::create([
            'id_roles' => 2,
            'nom' => 'Joan',
            'cognom' => 'Iglesias',
            'segon_cognom' =>'Marca',
            'dni' =>'694703154',
            'user_name' =>'joaniglesias',
            'password' =>Hash::make('joaniglesias'),
            'email' =>'joaniglesias@iesmontsia.org',
            'telefon' =>'694703154',
            'data_naixement' =>Carbon::create('1989', '06', '20'),
            'estat' =>'actiu',
          ])->assignRole('Gestor Institut');

          $user3=  User::create([
            'id_roles' => 3,
            'nom' => 'Pepe',
            'cognom' => 'Jimenez',
            'segon_cognom' =>'Garcia',
            'dni' =>'89061256A',
            'user_name' =>'pepejimenez',
            'password' =>Hash::make('pepejimenez'),
            'email' =>'pepejimenez@delinternet.com',
            'telefon' =>'356789130',
            'data_naixement' =>Carbon::create('1979', '03', '14'),
            'estat' =>'actiu',
          ])->assignRole('Gestor Empresa');

          $user4=  User::create([
            'id_roles' => 6,
            'nom' => 'Marc',
            'cognom' => 'Bernaltes',
            'segon_cognom' =>'Reverte',
            'dni' =>'50862481F',
            'user_name' =>'marcbernaltes',
            'password' =>Hash::make('marcbernaltes'),
            'email' =>'marcbernaltes@eports.com',
            'telefon' =>'693568105',
            'data_naixement' =>Carbon::create('1987', '10', '01'),
            'estat' =>'actiu',
          ])->assignRole('Empleat');

          $user5 =  User::create([
            'id_roles' => 4,
            'nom' => 'Joaquim',
            'cognom' => 'Bernaltes',
            'segon_cognom' =>'Jimenez',
            'dni' =>'79045812U',
            'user_name' =>'joaquimbernaltes',
            'password' =>Hash::make('joaquimbernaltes'),
            'email' =>'joaquimbernaltes@iesmontsia.org',
            'telefon' =>'693581690',
            'data_naixement' =>Carbon::create('2000', '09', '09'),
            'estat' =>'actiu',
          ])->assignRole('Alumne');

          $user6 =  User::create([
            'id_roles' => 5,
            'nom' => 'Alejandro',
            'cognom' => 'Milian',
            'segon_cognom' =>'Sanguesa',
            'dni' =>'01368361P',
            'user_name' =>'alejandromilian',
            'password' =>Hash::make('alejandromilian'),
            'email' =>'alejandromilian@iesmontsia.org',
            'telefon' =>'695158201',
            'data_naixement' =>Carbon::create('1983', '02', '02'),
            'estat' =>'actiu',
          ])->assignRole('Professor');

       
    }
}

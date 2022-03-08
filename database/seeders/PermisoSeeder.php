<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            'nom' => 'Crear Empresa',
            'id_modul' => 1,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Empresa',
            'id_modul' => 1,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Empresa',
            'id_modul' => 1,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Crear Institut',
            'id_modul' => 2,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Institut',
            'id_modul' => 2,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Institut',
            'id_modul' => 2,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Crear Categoria',
            'id_modul' => 3,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Categoria',
            'id_modul' => 3,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Categoria',
            'id_modul' => 3,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Pujar Recursos',
            'id_modul' => 4,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Baixar Recursos',
            'id_modul' => 4,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Accès Panell Adm.',
            'id_modul' => 5,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Crear Projecte',
            'id_modul' => 6,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Projecte',
            'id_modul' => 6,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Projecte',
            'id_modul' => 6,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Crear Incidencia',
            'id_modul' => 7,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Incidencia',
            'id_modul' => 7,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Incidencia',
            'id_modul' => 7,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Crear Usuari',
            'id_modul' => 8,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Editar Usuari',
            'id_modul' => 8,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Eliminar Usuari',
            'id_modul' => 8,
            'estat' => 'actiu',
          ]);

          DB::table('permisos')->insert([
            'nom' => 'Acces Gestor Centra',
            'id_modul' => 9,
            'estat' => 'actiu',
          ]); 
        
          DB::table('permisos')->insert([
            'nom' => 'Acces Gestors Institut',
            'id_modul' => 10,
            'estat' => 'actiu',
          ]); 

          DB::table('permisos')->insert([
            'nom' => 'Acces Gestors Empresa',
            'id_modul' => 11,
            'estat' => 'actiu',
          ]);








          
    }
}

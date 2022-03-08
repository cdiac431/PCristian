<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(RoleAssing::class);
        $this->call(MensajeEnviadoSeeder::class);
        $this->call(MensajeRecibidoSeeder::class);
        $this->call(IncidenciaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(InstitutoSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(GrupoClaseSeeder::class);
        $this->call(GrupoProfesorSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(PropuestaSeeder::class);
        $this->call(ProyectoSeeder::class);
        $this->call(PresupuestoSeeder::class);
        $this->call(LiniaPresupuestoSeeder::class);
        $this->call(WikiSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ComentarioSeeder::class);
        $this->call(VersionAnteriorSeeder::class);
        $this->call(ChatSeeder::class);
        $this->call(MensajeSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ComentarioPostSeeder::class);
        $this->call(DirectorisSeeder::class);
        $this->call(FitxersSeeder::class);
    }
}

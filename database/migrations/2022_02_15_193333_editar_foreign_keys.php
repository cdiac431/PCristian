<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditarForeignKeys extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
    
        Schema::table('alumnos', function (Blueprint $table) {


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_grup_tutoria')->references('id')->on('grupo_clases');
            $table->foreign('id_institut')->references('id')->on('institutos');
        });


        Schema::table('articulos', function (Blueprint $table) {


            $table->foreign('id_wiki')->references('id')->on('wikis');
            $table->foreign('id_usuari')->references('id')->on('users');
        });

        Schema::table('comentarios', function (Blueprint $table) {


            $table->foreign('id_article')->references('id')->on('articulos');
            $table->foreign('id_usuari')->references('id')->on('users');
        });

        Schema::table('comentario_posts', function (Blueprint $table) {


            $table->foreign('id_post')->references('id')->on('posts');
            $table->foreign('id_usuari')->references('id')->on('users');
        });

        Schema::table('empleados', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_empresa')->references('id')->on('empresas');
        });

        Schema::table('grupo_clases', function (Blueprint $table) {


            $table->foreign('id_institut')->references('id')->on('institutos');
            $table->foreign('id_tutor')->references('id')->on('profesors');
        });

        Schema::table('incidencias', function (Blueprint $table) {

            $table->foreign('id_usuari')->references('id')->on('users');
        });
        Schema::table('linia_presupuestos', function (Blueprint $table) {

            $table->foreign('id_pressupost')->references('id')->on('presupuestos');
        });


        Schema::table('mensajes', function (Blueprint $table) {
            $table->foreign('id_usuari')->references('id')->on('users');
            $table->foreign('id_xat')->references('id')->on('chats');
        });


        Schema::table('posts', function (Blueprint $table) {

            $table->foreign('id_usuari')->references('id')->on('users');
        });

        Schema::table('presupuestos', function (Blueprint $table) {

            $table->foreign('id_projecte')->references('id')->on('proyectos');
        });

        Schema::table('profesors', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_institut')->references('id')->on('institutos');
        });

        Schema::table('grupo_profesors', function (Blueprint $table) {


            $table->foreign('id_grup')->references('id')->on('grupo_clases');
            $table->foreign('id_professor')->references('id')->on('profesors');
        });

        Schema::table('proyectos', function (Blueprint $table) {
            $table->foreign('id_proposta')->references('id')->on('propuestas');
        });

        Schema::table('propuestas', function (Blueprint $table) {


            $table->foreign('id_institut')->references('id')->on('institutos');
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_responsable')->references('id')->on('users');
            $table->foreign('id_solicitant')->references('id')->on('users');
        });

        Schema::table('version_anteriors', function (Blueprint $table) {


            $table->foreign('id_article')->references('id')->on('articulos');
            $table->foreign('id_usuari')->references('id')->on('users');
        });

        Schema::table('wikis', function (Blueprint $table) {


            $table->foreign('id_projecte')->references('id')->on('proyectos');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_roles')->references('id')->on('roles');
        });

        Schema::table('institut_validacions', function (Blueprint $table) {
            $table->foreign('id_institut')->references('id')->on('institutos');
        });

        Schema::table('empresa_validacions', function (Blueprint $table) {
            $table->foreign('id_empresa')->references('id')->on('empresas');
        });

        Schema::table('directoris', function (Blueprint $table) {
            $table->foreign('id_usuari')->references('id')->on('users');
            $table->foreign('id_projecte')->references('id')->on('proyectos');
            $table->foreign('id_directori')->references('id')->on('directoris');
        });

        Schema::table('fitxers', function (Blueprint $table) {
            $table->foreign('id_directori')->references('id')->on('directoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

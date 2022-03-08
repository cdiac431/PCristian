<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('id', );
            $table->unsignedBigInteger('id_proposta', );
            $table->string('ruta_imatge', 255)->default('projecteDefault.jpg');
            $table->datetime('data_inici')->useCurrent();
            $table->datetime('data_final')->nullable();
            $table->string('nom_projecte', 100);
            $table->string('motiu', 100)->nullable();
            $table->enum('estat', ['actiu', 'inactiu', ''])->default('actiu');
            $table->timestamps();
            $table->enum('finalitzat', ['Si', 'No'])->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}

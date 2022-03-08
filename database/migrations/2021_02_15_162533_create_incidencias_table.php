<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_usuari',);
            $table->enum('estat_incidencia', ['Enviat', 'En Procès', 'Resolt'])->nullable();
            $table->string('nom', 200);
            $table->string('descripcio', 2000);
            $table->datetime('registre_data')->useCurrent();
            $table->enum('estat', ['actiu', 'inactiu', ''])->default('actiu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->id('id', );
            $table->unsignedBigInteger('id_empresa', )->nullable();
            $table->unsignedBigInteger('id_institut', )->nullable();
            $table->unsignedBigInteger('id_categoria', );
            $table->unsignedBigInteger('id_responsable', );
            $table->unsignedBigInteger('id_solicitant',)->nullable();
            $table->string('nom', 100);
            $table->string('descripcio', 2000);
            $table->string('requeriments', 500);
            $table->string('ruta_imatge', 500)->default('imatge6.jpg');
            $table->string('estimacio_economica', 500);
            $table->enum('estat_proposta', ['Disponible', 'Sol·licitada', 'Assignada'])->nullable();
            $table->string('motiu', 100)->nullable();
            $table->datetime('data_publicacio')->useCurrent();
            $table->datetime('data_acceptacio')->nullable();
            $table->integer('valoracio')->nullable();
            $table->integer('num_valoracions')->default(0);
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
        Schema::dropIfExists('propuestas');
    }
}

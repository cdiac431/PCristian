<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id', );
            $table->string('nom', 100);
            $table->string('localitat', 30);
            $table->string('direccio', 100);
            $table->string('telefon', 30);
            $table->string('cif', 50);
            $table->string('email', 100);
            $table->string('ruta_imatge', 255)->default('empresaDefault.jpg');
            $table->string('ruta_document', 255)->default('Buit');
            $table->enum('estat', ['actiu','inactiu','pendent',''])->default('actiu');
            $table->string('lat', 50)->default('NULL');
            $table->string('lon', 50)->default('NULL');
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
        Schema::dropIfExists('empresas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutos', function (Blueprint $table) {
            $table->id('id', );
            $table->string('nom', 100);
            $table->string('localitat', 50);
            $table->string('direccio', 100);
            $table->string('telefon', 9);
            $table->string('cif', 9);
            $table->string('email', 60);
            $table->string('ruta_imatge', 255)->default('institutDefault.jpg');
            $table->string('ruta_document', 255)->default('Buit');
            $table->enum('estat', ['actiu', 'inactiu', 'pendent', ''])->default('actiu');
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
        Schema::dropIfExists('institutos');
    }
}

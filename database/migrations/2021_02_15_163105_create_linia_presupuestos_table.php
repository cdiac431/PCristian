<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiniaPresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linia_presupuestos', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_pressupost',);
            $table->string('nom_cost', 30);
            $table->string('preu_cost', 9);
            $table->string('quantitat_cost', 9);
            $table->string('total_linia_producte', 60);
            $table->string('iva', 10);
            $table->enum('procedencia', ['Centre', 'Entitat', ''])->nullable();
            $table->enum('estat_proposta', ['Acceptat', 'Realitzat', 'No acceptat', ''])->default('Realitzat');
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
        Schema::dropIfExists('linia_presupuestos');
    }
}

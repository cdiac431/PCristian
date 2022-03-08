<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_clases', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_institut',);
            $table->unsignedBigInteger('id_tutor',);
            $table->string('nom',30);
            $table->enum('estat',['actiu','inactiu'])->default('actiu');
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
        Schema::dropIfExists('grupo_clases');
    }
}

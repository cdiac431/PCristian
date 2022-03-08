<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitxersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitxers', function (Blueprint $table) {
            $table->id('id',);
            $table->string('nom',30);
            $table->string('extensio',30);
            $table->string('tamany',30);
            $table->unsignedBigInteger('id_directori');
            $table->datetime('data_publicacio')->useCurrent();
            //$table->enum('estat',['actiu','inactiu',''])->default('actiu');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fitxers');
    }
}

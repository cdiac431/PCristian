<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directoris', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom');
            $table->unsignedBigInteger('id_usuari')->nullable();
            $table->unsignedBigInteger('id_projecte')->nullable();
            $table->unsignedBigInteger('id_directori')->nullable();
            $table->datetime('data_creacio')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directoris');
    }
}

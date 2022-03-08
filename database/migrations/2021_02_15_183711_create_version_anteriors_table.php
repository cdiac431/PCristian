<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionAnteriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version_anteriors', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_article',);
            $table->unsignedBigInteger('id_usuari',);
            $table->string('nom', 70);
            $table->string('cos', 2000);
            $table->datetime('data_ultima_modificacio')->useCurrent();
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
        Schema::dropIfExists('version_anteriors');
    }
}

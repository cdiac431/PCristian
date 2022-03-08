<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {

            $table->id('id',);
            $table->unsignedBigInteger('id_usuari',);
            $table->unsignedBigInteger('id_xat',);
            $table->datetime('data')->useCurrent();
            $table->enum('estat_missatge', ['Enviat', 'Rebut', 'Llegit'])->nullable();
            $table->string('contingut', 2000);
            $table->enum('estat', ['actiu', 'inactiu', '',])->default('actiu');
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
        Schema::dropIfExists('mensajes');
    }
}

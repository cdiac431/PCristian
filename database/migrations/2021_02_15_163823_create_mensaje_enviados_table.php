<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajeEnviadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_enviados', function (Blueprint $table) {
            $table->id('id',);
            $table->string('remitent', 50);
            $table->datetime('data_hora')->useCurrent();
            $table->string('assumpte', 100);
            $table->string('cos', 2000);
            $table->string('link_proposta', 255)->nullable();
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
        Schema::dropIfExists('mensaje_enviados');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_posts', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_post',);
            $table->unsignedBigInteger('id_usuari',);
            $table->string('contingut',2000);
            $table->datetime('data')->useCurrent();
            $table->enum('estat',['actiu','inactiu',''])->default('actiu');
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
        Schema::dropIfExists('comentario_posts');
    }
}

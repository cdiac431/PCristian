<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_usuari',)->nullable();
            $table->string('titol', 100);
            $table->datetime('data')->useCurrent();
            $table->string('ruta_blog',255)->default('default.jpg');
            $table->string('entradeta', 1000);
            $table->string('contingut', 12000);
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
        Schema::dropIfExists('posts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id',);
            $table->unsignedBigInteger('id_roles',);
            $table->string('nom',30);
            $table->string('cognom',30);
            $table->string('segon_cognom',30);
            $table->string('dni',9);
            $table->string('user_name',50);
            $table->string('password',260);
            $table->string('ruta_avatar',255)->default('default.jpg');
            $table->string('email',50);
            $table->string('telefon',15);
            $table->date('data_naixement')->nullable();
            $table->enum('estat', ['actiu', 'inactiu'])->default('actiu');
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
        Schema::dropIfExists('users');
    }
}

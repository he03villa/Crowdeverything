<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto')->nullable();
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono',10);
            $table->string('identificacion',11);
            $table->string('direccion',45);
            $table->string('nombre_usuario',45);
            $table->string('password');
            $table->text('descripcion')->nullable();
            $table->integer('estado');            
            $table->rememberToken();
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

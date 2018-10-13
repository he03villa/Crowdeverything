<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->unsignedInteger('ciudad_id');
            $table->unsignedInteger('tipo_documento_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudads');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['ciudad_id']);
            $table->dropForeign(['tipo_usuario_id']);
            $table->dropColumn('ciudad_id');
            $table->dropColumn('tipo_usuario_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
          $table->increments('Id_proceso');
          $table->string('Numero_proceso',8);
          $table->string('Descripcion',200);
          $table->string('Sede',6);
          $table->decimal('Presupuesto', 6,3);
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('procesos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnoadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnoadmin', function (Blueprint $table) {
            //Atributos de la tabla
            $table->increments('id');
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->double('precio_cancha',7,2);
            $table->tinyInteger('adic_luz');
            $table->double('precio_adic',7,2)->nullable();
            $table->tinyInteger('habilitado');
            $table->tinyInteger('fijo');
            $table->integer('id_dia')->unsigned()->default(0);
            $table->integer('id_usuario_admin')->unsigned()->default(0);
            $table->integer('id_cancha')->unsigned()->default(0);

            //Declaracion de las Foreign Keys
            $table->foreign('id_dia')
                  ->references('id')->on('dia')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('id_usuario_admin')
                  ->references('id')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('id_cancha')
                  ->references('id')->on('cancha')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnoadmin');
    }
}

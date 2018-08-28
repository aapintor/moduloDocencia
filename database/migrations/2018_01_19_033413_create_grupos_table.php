<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('alumno');
            $table->foreign('alumno')->references('nc')->on('alumnos');
            $table->integer('materia');
            $table->foreign('materia')->references('id')->on('materias');
            $table->integer('ciclo');
            $table->foreign('ciclo')->references('id')->on('ciclo_escs');
            $table->string('dia1');
            $table->string('hora1');
            $table->string('salon1');
            $table->string('dia2');
            $table->string('hora2');
            $table->string('salon2');
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
        Schema::dropIfExists('grupos');
    }
}

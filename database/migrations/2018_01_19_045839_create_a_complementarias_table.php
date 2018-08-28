<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAComplementariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_complementarias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('alumno');
            $table->foreign('alumno')->references('nc')->on('alumnos');
            $table->string('actividad');
            $table->integer('creditos');
            $table->string('fecha_del');
            $table->string('fecha_al');
            $table->string('horas')->nullable();
            $table->decimal('calificacion',5,2);
            $table->string('docente_resp');
            $table->foreign('docente_resp')->references('rfc')->on('docentes');
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
        Schema::dropIfExists('a_complementarias');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alumno');
            $table->foreign('alumno')->references('nc')->on('alumnos');
            $table->integer('plan');
            $table->foreign('plan')->references('id')->on('plans');
            $table->integer('opc_titu');
            $table->string('asesor');
            $table->foreign('asesor')->references('rfc')->on('docentes');
            $table->string('sinodal1');
            $table->foreign('sinodal1')->references('rfc')->on('docentes');
            $table->string('sinodal2');
            $table->foreign('sinodal2')->references('rfc')->on('docentes');
            $table->string('sinodal3');
            $table->foreign('sinodal3')->references('rfc')->on('docentes');
            $table->string('proyecto');
            $table->string('folio_acta');
            $table->string('estatus');
            $table->string('fecha_cer')->nullable();
            $table->string('lugar')->nullable();
            $table->string('hora')->nullable();
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
        Schema::dropIfExists('titulacions');
    }
}

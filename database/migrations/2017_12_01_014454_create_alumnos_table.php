<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('nc',8)->unique();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->integer('carrera');
            $table->foreign('carrera')->references('id')->on('carreras');
            $table->integer('plan');
            $table->foreign('plan')->references('id')->on('plans');
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('calle')->nullable();
            $table->string('num')->nullable();
            $table->string('colonia')->nullable();
            $table->timestamps();
            $table->primary('nc');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('rfc',13)->unique();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('grado');
            $table->string('desc')->nullable();
            $table->string('email')->unique();
            $table->char('sexo',1);
            $table->integer('depto')->unsigned();
            $table->foreign('depto')->references('id')->on('deptos');
            $table->integer('inv')->unsigned();
            $table->foreign('inv')->references('id')->on('linea_invs');
            $table->timestamps();
            $table->primary('rfc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}

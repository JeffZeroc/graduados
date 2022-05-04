<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('CODIGO_EJECUTAR');
            $table->string('Nombre_Carrera');
            $table->string('Codigo_Carrera');
            $table->integer('Duracion_Carrera');
            $table->string('Estado_Carrera');
            $table->bigInteger('facultad_id')->unsigned();
            $table->foreign('facultad_id')->references('id')->on('facultads')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('carreras');
    }
}

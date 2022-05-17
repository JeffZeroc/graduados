<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('telefono')->nullable();
            $table->string('curso');
            $table->string('correo_institucional')->nullable();
            $table->string('Correo_personal')->nullable();
            $table->string('estado');
            $table->date('fecha_nacimiento')->nullable();/*  */
            $table->string('edad')->nullable();
            $table->string('genero');
            $table->string('convencional')->nullable();
            $table->string('etnia');
            $table->string('nacionalidad_etnica');
            $table->string('discapacidad')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('pais');/*  */
            $table->bigInteger('periodo_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('estudiantes');
    }
}

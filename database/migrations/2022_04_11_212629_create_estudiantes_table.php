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
            $table->integer('Cedula_Estudiante');
            $table->string('Nombre_Estudiante');
            $table->string('Apellido_Estudiante');
            $table->string('Telefono_Estudiante');
            $table->string('Nombre_CursoE');
            $table->string('Correo_InstitucionalE');
            $table->string('Correo_PersonalE');
            $table->string('Estado_Estudiante');
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

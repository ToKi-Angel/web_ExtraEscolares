<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono');
            $table->string('tipo');
            $table->string('categoria')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('horaCivica')->nullable()->default(0);
            $table->integer('horaDeportiva')->nullable()->default(0);
            $table->integer('horaCultural')->nullable()->default(0);
            $table->string('descripcion')->nullable()->default("No hay descripción provista");
            $table->string('descripcionCultural')->nullable();
            $table->string('descripcionDeportiva')->nullable();
            $table->string('descripcionCivica')->nullable();
            $table->string('procedencia');
            $table->date('fecha');
            $table->date('fechaIngreso');
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
        Schema::dropIfExists('ingreso');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_biblioteca')->default('1'); // Biblioteca que pertenece
            $table->string('nombre_responsable');
            $table->string('cargo_responsable');
            $table->string('telefono_responsable');
            $table->string('celular_responsable');
            $table->string('correo_responsable');
            $table->string('nombre_encargado');
            $table->string('cargo_encargado');
            $table->string('telefono_encargado');
            $table->string('celular_encargado');
            $table->string('correo_encargado');
            $table->longText('comentarios');
            $table->foreign('id_biblioteca')->references('id')->on('bibliotecas')->onDelete('cascade');
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
        Schema::dropIfExists('dependencias');
    }
}

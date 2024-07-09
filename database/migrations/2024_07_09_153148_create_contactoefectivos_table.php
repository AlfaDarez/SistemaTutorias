<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoefectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactoefectivos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_bioblioteca');// Id de la biblioteca
            $table->unsignedInteger('id_tutor');// Id del tutor a cargo
            $table->longText('seguimiento');
            $table->longText('actividadEnSistema');
            $table->longText('resumenParaFichas');
            $table->date('fecha');
            $table->foreign('id_tutor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_bioblioteca')->references('id')->on('bibliotecas')->onDelete('cascade');
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
        Schema::dropIfExists('contactoefectivos');
    }
}

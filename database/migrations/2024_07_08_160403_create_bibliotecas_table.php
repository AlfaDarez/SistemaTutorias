<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clavebdt', 100)->unique();
            $table->string('iniciativa');
            $table->string('pertenencia');
            $table->string('escolarizado');
            $table->string('actividadPublica');
            $table->string('servicio');
            $table->string('claveMatutino');
            $table->string('nombreMatutino');
            $table->string('claveVespertino');
            $table->string('nombreVespertino');
            $table->string('estado');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('domicilio');
            $table->string('codPostal',5);
            $table->string('lat');
            $table->string('long');
            $table->string('personal');
            $table->string('nomina');
            $table->string('maxParticipantes');
            $table->double('costoHabilitación');
            $table->string('fechaEntrega');
            $table->string('fechaInicioConvenio');
            $table->string('fechaTerminoConvenio');
            $table->string('convenioColaboracion');
            $table->string('convenioVencido');
            $table->string('sitiacionEquipo');
            $table->string('dependencia');
            $table->string('estatus');
            $table->string('estatus_temporal');
            $table->unsignedInteger('tutor_id')->default('1'); // Id del tutor a cargo
            $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bibliotecas');
    }
}

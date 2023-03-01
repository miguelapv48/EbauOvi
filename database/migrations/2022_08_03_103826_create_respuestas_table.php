<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->string('respuesta');
            $table->string('correcta');
            $table->unsignedBigInteger('id_pregunta');
            $table->foreign('id_pregunta')
                   ->references('id')
                   ->on('preguntas')
                   ->delete('cascade');
        });
    }

}

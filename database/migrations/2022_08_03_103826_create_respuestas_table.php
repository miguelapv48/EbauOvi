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
            $table->id();
            $table->string('respuesta');
            $table->string('correcta')->nullable();
            $table->unsignedBigInteger('preguntas_id');
            $table->foreign('preguntas_id')
                   ->references('id')
                   ->on('preguntas')
                   ->onDelete('cascade');
        });
    }

}

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
            $table->boolean('correcta')->default(false);
            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')
                   ->references('id')
                   ->on('preguntas')
                   ->onDelete('cascade');
        });
    }

}

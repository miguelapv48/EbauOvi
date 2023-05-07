<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('examen_id');
            $table->string('titulo');
            $table->timestamps();
            $table->foreign('examen_id')
                   ->references('id')
                   ->on('examenes')
                   ->onDelete('cascade');
        });
    }
  
}


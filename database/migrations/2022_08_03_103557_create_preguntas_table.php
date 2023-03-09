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
            $table->UnsignedBigInteger('id_test');
            $table->string('pregunta');
            $table->timestamps();
            $table->foreign('id_test')
                   ->references('id')
                   ->on('tessts')
                   ->onDelete('cascade');
        });
    }
  
}


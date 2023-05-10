<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_respuesta', function (Blueprint $table) {
            $table->unsignedBigInteger('entrega_id');
            $table->foreign('entrega_id')
                ->references('id')
                ->on('entregas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('respuesta_id');
            $table->foreign('respuesta_id')
                ->references('id')
                ->on('respuestas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_respuesta');
    }
};
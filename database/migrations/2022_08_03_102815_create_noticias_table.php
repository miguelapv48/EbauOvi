<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('usuario_id');
            $table->string('titulo')->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
            $table->foreign('usuario_id')
                   ->references('id')
                   ->on('users')
                   ->delete('cascade');
        });
    }

}

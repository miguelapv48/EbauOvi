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
            $table->UnsignedBigInteger('id_usuario');
            $table->string('nombre')->unique();
            $table->string('tipo')->nullable();
            $table->timestamps();
            $table->foreign('id_usuario')
                   ->references('id')
                   ->on('users')
                   ->delete('cascade');
        });
    }

}

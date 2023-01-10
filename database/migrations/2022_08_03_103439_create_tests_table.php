<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');

            $table->unsignedBigInteger('id_asignatura');
            $table->foreign('id_asignatura')
                   ->references('id')
                   ->on('asignaturas')
                   ->delete('cascade');
        });
    }
}

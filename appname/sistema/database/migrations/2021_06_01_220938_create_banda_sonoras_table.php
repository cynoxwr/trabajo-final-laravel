<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandaSonorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banda_sonoras', function (Blueprint $table) {
            $table->id();

            $table->string('Director');
            $table->string('GrupoMusical');
            $table->string('Canciones');
            $table->unsignedBigInteger('pelicula_id');

            $table->timestamps();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banda_sonoras');
    }
}

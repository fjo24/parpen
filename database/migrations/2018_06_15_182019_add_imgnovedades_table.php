<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgnovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgnovedades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('novedad_id')->unsigned();
            $table->string('imagen');
            $table->string('orden')->nullable();

            $table->foreign('novedad_id')->references('id')->on('novedades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imgnovedades');
    }
}

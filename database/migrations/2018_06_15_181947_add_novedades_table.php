<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->string('video');
            $table->text('video_descripcion');
            $table->enum('seccion', ['home', 'empresa']);
            $table->string('orden');
            $table->timestamps();
        });
    }

    /**'nombre', 'fecha', 'descripcion', 'video', 'video_descripcion', 'seccion', 'orden',
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novedades');
    }
}

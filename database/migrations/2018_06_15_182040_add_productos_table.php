<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo');
            $table->text('descripcion')->nullable();
            $table->text('contenido');
            $table->string('video')->nullable();
            $table->text('video_titulo')->nullable();
            $table->text('video_descripcion')->nullable();
            $table->string('precio');
            $table->enum('visible', ['publico', 'privado', 'ambos']);
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *'nombre', 'codigo', 'descripcion', 'contenido', 'categoria_id', 'video', 'video_descripcion', 'precio', 'visible', 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

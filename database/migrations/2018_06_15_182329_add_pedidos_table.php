<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('iva');
            $table->string('subtotal')->nullable();
            $table->string('total');
            $table->integer('distribuidor_id')->unsigned();

            $table->foreign('distribuidor_id')->references('id')->on('distribuidores')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('distribuidor_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('distribuidor_id')->unsigned();
            $table->string('cantidad');
            $table->string('costo');
            $table->timestamps();
            
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidores')->onDelete('cascade');
            
        });
    }

    /**      

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribuidor_pedido');
        Schema::dropIfExists('pedidos');
    }
}

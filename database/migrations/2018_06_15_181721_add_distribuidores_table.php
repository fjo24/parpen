<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistribuidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuidores', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('userdistribuidor', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('telefono', 100)->nullable();
            $table->string('password', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distribuidores');
    }
}

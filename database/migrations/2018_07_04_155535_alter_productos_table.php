<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductosTable extends Migration
{
     public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->enum('tipo', ['novedad', 'oferta', 'ninguna'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn('tipo');
        });
    }
}

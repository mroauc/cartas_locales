<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('precio');
            $table->boolean('disponible')->default(1);
            $table->integer('stock')->default(0);
            $table->biginteger('id_local')->nullable()->unsigned();
            $table->foreign('id_local')->references('id')->on('locals')->onDelete('cascade');
            $table->biginteger('id_categoria')->nullable()->unsigned();
            $table->foreign('id_categoria')->references('id')->on('categoria_productos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}

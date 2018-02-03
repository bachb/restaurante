<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->text('long_description')->nullable();
            $table->float('price'); //precio de venta,precio de compra,precio unitario,precio por mayor
            $table->boolean('featured')->default(false);//producto destacado solo por el usuario
            $table->integer('order')->nullable();

            //FK n->1
            $table->softDeletes();
            $table->integer('category_id')->unsigned()->nullable(); //se crea la columna
            $table->foreign('category_id')->references('id')->on('categories');//hacemos que la columna actue como FK

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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->boolean('featured')->default(false);//imagen destacada solo por el usuario
            //FK n->1
            $table->integer('product_id')->unsigned()->nullable(); //se crea la columna
            $table->foreign('product_id')->references('id')->on('products');//hacemos que la columna actue como FK
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
        Schema::dropIfExists('product_images');
    }
}

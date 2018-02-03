<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('email');
            $table->string('logo')->nullable();
            $table->boolean('featured')->default(false);//imagen destacada solo por el usuario
            $table->text('long_description')->nullable();
            $table->string('direccion');
            $table->string('municipio');
            $table->string('departamento');
            $table->integer('limit')->default(8);
            //FK n->1
            $table->integer('user_id')->unsigned()->nullable(); //se crea la columna
            $table->foreign('user_id')->references('id')->on('users');//hacemos que la columna actue como FK
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
        Schema::dropIfExists('companies');
    }
}

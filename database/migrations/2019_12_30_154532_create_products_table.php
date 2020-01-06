<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    $table->bigIncrements('id');
    $table->integer('category_id')->unsigned();

    $table->foreign('category_id')
      ->references('id')->on('categories')
      ->onDelete('cascade');
      $table->integer('gender_id')->unsigned();

      $table->foreign('gender_id')
        ->references('id')->on('genders')
        ->onDelete('cascade');


    $table->string('name');
    $table->string('img');
    $table->double('price');
    $table->text('description');
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

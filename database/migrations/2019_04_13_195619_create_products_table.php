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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100)->nullable()->default('nome');
            $table->string('image')->nullabe()->default('produto.jpg');
            $table->string('description',200)->default('Não há descrição para esse produto.');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

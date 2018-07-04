<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->decimal('total');
            $table->integer('oder_id')->unsigned();
            $table->integer('product_id')->unsigned();
           // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
       
            // $table->foreign('oder_id')->references('id')->on('oders')->onDelete('cascade');
         
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
        Schema::dropIfExists('oder_product');
    }
}

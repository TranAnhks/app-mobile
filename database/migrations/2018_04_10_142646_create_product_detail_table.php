<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpu');
            $table->string('ram');
            $table->string('screen');
            $table->string('storage');// lưu trử
            $table->string('exten_memmory');// thẻ nhớ ngoài
            $table->string('cam1');
            $table->string('cam2');
            $table->string('sim');
            $table->string('pin');            
            $table->string('os');            
            $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;          
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
        Schema::dropIfExists('product_details');
    }
}

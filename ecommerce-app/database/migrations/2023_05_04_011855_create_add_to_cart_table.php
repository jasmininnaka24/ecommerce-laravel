<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addToCart', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('user_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('unit_price');
            $table->string('size');
            $table->string('quantity');
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
        Schema::dropIfExists('addToCart');
    }
}

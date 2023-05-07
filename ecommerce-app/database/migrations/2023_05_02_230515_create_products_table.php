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
            $table->id();
            $table->string('product_img')->default('');
            $table->string('product_category')->default('');
            $table->string('product_subcategory')->default('')->nullable();
            $table->string('product_name')->default('');
            $table->string('product_small')->default('');
            $table->string('product_medium')->default('');
            $table->string('product_large')->default('');
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

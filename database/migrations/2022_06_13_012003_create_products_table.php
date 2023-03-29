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
            $table->integerIncrements('id');
            $table->string('product_images');
            $table->string('product_name');
            $table->string('product_color');
            $table->text('product_content');
            $table->text('product_description');
            $table->float('product_price', 15, 3);
            $table->float('product_discount', 15, 3);
            $table->string('product_ram');
            $table->string('product_memory');
            $table->integer('product_hot');
            $table->integer('product_status');
            $table->string('product_alias');
            $table->integer('product_cn');
            $table->integer('category_id');
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
        Schema::dropIfExists('products');
    }
}

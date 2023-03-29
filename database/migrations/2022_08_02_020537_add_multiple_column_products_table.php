<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_chip')->after('product_memory');
            $table->string('product_mh')->after('product_chip');
            $table->string('product_cs')->after('product_mh');
            $table->string('product_ct')->after('product_cs');
            $table->string('product_hdh')->after('product_ct');
            $table->string('product_pin')->after('product_hdh');
            $table->string('product_sim')->after('product_pin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_chip');
            $table->dropColumn('product_mh');
            $table->dropColumn('product_cs');
            $table->dropColumn('product_ct');
            $table->dropColumn('product_hdh');
            $table->dropColumn('product_pin');
            $table->dropColumn('product_sim');
        });
    }
}

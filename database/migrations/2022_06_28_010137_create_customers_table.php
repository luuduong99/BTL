<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('customer_image');
            $table->string('customer_email', 100)->unique();
            $table->string('customer_name');
            $table->string('customer_acc');
            $table->string('customer_password');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->integer('customer_gender');
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
        Schema::dropIfExists('customers');
    }
}

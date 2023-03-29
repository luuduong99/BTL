<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('order_pt')->after('total_price');
            $table->string('vpn_response_code')->after('order_pt');
            $table->string('code_vnpay')->after('vpn_response_code');
            $table->string('code_bank')->after('code_vnpay');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_pt');
            $table->dropColumn('vpn_response_code');
            $table->dropColumn('code_vnpay');
            $table->dropColumn('code_bank');
        });
    }
}

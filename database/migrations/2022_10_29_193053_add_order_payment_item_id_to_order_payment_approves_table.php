<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderPaymentItemIdToOrderPaymentApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_payment_approves', function (Blueprint $table) {
            $table->foreignId('order_payment_item_id')->after('order_payment_id')->nullable()->references('id')->on('order_payment_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_payment_approves', function (Blueprint $table) {
            //
        });
    }
}

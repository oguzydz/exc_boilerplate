<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payment_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('order_payment_id')->references('id')->on('order_payments');
            $table->string('payment_transaction_id');
            $table->tinyInteger('transaction_status');
            $table->decimal('price', 10, 2);
            $table->decimal('paid_price', 10, 2);
            $table->decimal('merchant_commission_rate', 10, 2);
            $table->decimal('merchant_commission_rate_amount', 10, 2);
            $table->decimal('iyzi_commission_rate_amount', 10, 2);
            $table->decimal('iyzi_commission_fee', 10, 2);
            $table->decimal('blockage_rate', 10, 2)->nullable();
            $table->decimal('blockage_rate_amount_merchant', 10, 2)->nullable();
            $table->decimal('blockage_rate_amount_sub_merchant', 10, 2)->nullable();
            $table->string('blockage_resolved_date');
            $table->string('sub_merchant_key');
            $table->decimal('sub_merchant_price', 10, 2)->nullable();
            $table->decimal('sub_merchant_payout_rate', 10, 2)->nullable();
            $table->decimal('sub_merchant_payout_amount', 10, 2)->nullable();
            $table->decimal('merchant_payout_amount', 10, 2)->nullable();
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
        Schema::dropIfExists('order_payment_items');
    }
}

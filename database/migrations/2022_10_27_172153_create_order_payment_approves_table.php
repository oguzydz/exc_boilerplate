<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payment_approves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('order_payment_id')->references('id')->on('order_payments');
            $table->string('payment_transaction_id');
            $table->string('status');
            $table->string('error_code')->nullable();
            $table->string('error_message')->nullable();
            $table->string('error_group')->nullable();
            $table->string('locale')->nullable();
            $table->string('system_time')->nullable();
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
        Schema::dropIfExists('order_approves');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->decimal('sub_total_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('currency');
            $table->string('payment_id');
            $table->string('payment_status')->nullable();
            $table->tinyInteger('fraud_status');
            $table->decimal('merchant_commission_rate', 10, 2);
            $table->decimal('merchant_commission_rate_amount', 10, 2);
            $table->decimal('iyzi_commission_rate_amount', 10, 2);
            $table->decimal('iyzi_commission_fee', 10, 2);
            $table->string('card_type');
            $table->string('card_association');
            $table->string('card_family');
            $table->string('card_token')->nullable();
            $table->string('card_user_key')->nullable();
            $table->string('bin_number')->nullable();
            $table->string('basket_id')->nullable();
            $table->string('connector_name')->nullable();
            $table->string('auth_code')->nullable();
            $table->string('phase')->nullable();
            $table->string('last_four_digits');
            $table->string('pos_order_id')->nullable();
            $table->string('status');
            $table->string('error_code')->nullable();
            $table->string('error_message')->nullable();
            $table->string('error_group')->nullable();
            $table->string('locale')->nullable();
            $table->string('systemTime')->nullable();
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
        Schema::dropIfExists('order_payments');
    }
}

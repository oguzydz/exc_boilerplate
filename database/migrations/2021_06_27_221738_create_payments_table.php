<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('papara_account_name')->nullable();
            $table->string('papara_payment_date')->nullable();
            $table->string('bitcoin_wallet_address')->nullable();
            $table->string('bitcoin_payment_date')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_payment_date')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

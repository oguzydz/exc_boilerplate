<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->string('papara_account_name');
            $table->string('papara_account_number');
            $table->string('bitcoin_wallet_address');
            $table->string('bitcoin_wallet_network_name');
            $table->string('bank_account_name');
            $table->string('bank_account_iban');
            $table->string('whatsapp');
            $table->string('whatsapp_text');
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
        Schema::dropIfExists('payment_settings');
    }
}

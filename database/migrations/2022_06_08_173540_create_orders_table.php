<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('county_id')->references('id')->on('counties');
            $table->string('zip_code');
            $table->string('identity_number');
            $table->text('note')->nullable();
            $table->decimal('cargo_price', 10, 2);
            $table->decimal('sub_total_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('ip_address', 45)->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('orders');
    }
}

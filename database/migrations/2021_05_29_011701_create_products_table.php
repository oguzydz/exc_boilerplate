<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('title');
            $table->longText('text');
            $table->string('slug');
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2);
            $table->string('image');
            $table->integer('stock');
            $table->integer('delivery_time');
            $table->tinyInteger('status');
            $table->integer('order');
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
        Schema::dropIfExists('products');
    }
}

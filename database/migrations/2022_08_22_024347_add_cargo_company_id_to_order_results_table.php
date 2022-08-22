<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCargoCompanyIdToOrderResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_results', function (Blueprint $table) {
            $table->foreignId('cargo_company_id')->after('order_id')->nullable()->references('id')->on('cargo_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_results', function (Blueprint $table) {
            //
        });
    }
}

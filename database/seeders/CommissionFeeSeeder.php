<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommissionFee;


class CommissionFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommissionFee::create([
            'price'                   => 50.000,
            'finish_price'            => 99.000,
            'percent'                 => 0,49,
            'local_processing_fee'    => 3.49,
            'foreign_proccessing_fee' => 4.99
        ]);
    }
}

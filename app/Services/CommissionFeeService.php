<?php

namespace App\Services;

use App\Models\CommissionFee;

class CommissionFeeService
{
    const TAX      = 18;
    const PERCENT  = 100;
    const CARGO_ID = 999999999;

    public $commissionFee;

    public function __construct()
    {
        $this->commissionFee = CommissionFee::first();
    }

    /**
     * Get Commissioned Price
     * @param  integer  $price;
     * @param  integer  $quantity;
     * @param  integer  $total;
     * @param  integer  $hasCargo;
     *
     * @return  integer
     */
    public function getCommissionedPrice(int $price, int $quantity, $total, $hasCargo = 0)
    {
        dd($this->commissionFee->percent);
        $totalPrice         = $price * $quantity;
        $comissionPercent   = ($totalPrice * $this->commissionFee->percent) / self::PERCENT;
        $localProcessingFee = $this->commissionFee->local_processing_fee / $total;
        $comissionFee       = (($comissionPercent + $localProcessingFee) * self::TAX) / self::PERCENT;

        return $totalPrice - $comissionPercent - $localProcessingFee - $comissionFee;
    }

    public function getCargoProduct()
    {
        return [
            'id'       => self::CARGO_ID,
            'name'     => 'Kargo Ücreti',
            'category' => 'Kargo',
            'qty'      => 1,
        ];
    }
}

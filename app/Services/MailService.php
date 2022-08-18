<?php

namespace App\Services;

use App\Mail\NewOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function __construct()
    {
        //
    }

    /**
     * Send new order email to customer & shop
     * @param  Order  $order;
     *
     * @return  integer
     */
    public function sendNewOrder(Order $order)
    {
        Mail::to($order->email)->send(new NewOrder($order));
    }
}

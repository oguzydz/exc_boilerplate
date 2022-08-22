<?php

namespace App\Services;

use App\Mail\NewOrder;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\OrderResult;
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

    /**
     * Send shipped order email to customer & shop
     * @param  Order  $order;
     *
     * @return  integer
     */
    public function sendShippedOrder(Order $order)
    {
        Mail::to($order->email)->send(new OrderShipped($order));
    }
}

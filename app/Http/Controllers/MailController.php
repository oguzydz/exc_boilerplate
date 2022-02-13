<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   public function sendMail()
   {
        Mail::to('noomercy81@gmail.com')->send(new OrderShipped());
   }
}

<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class OrderMailController extends Controller
{
    public function index()
    {

        $mailData=[
            'Customer Name' => 'arefin',
            'Order ID' => 'OR00154',
            'Order Date' => '02/02/2024',
            'Order Product' => 'NF9117_black',
            'Order Total' => '2500',
        ];
        Mail::to('arefnrahman.dany@gmail.com')->send(new OrderMail($mailData));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Omail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
class OmailController extends Controller
{
    public function mail()
    {
        $details = [
            'title' => 'Order Email from Lucky',
            'body' => 'This is Order email.'
        ];

        Mail::to('kyawnn@gmail.com')->send(new OrderMail($details));

        return 'Email sent';
    }
}

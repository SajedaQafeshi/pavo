<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;
   
    private $products, $order, $orderItems, $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($products, $order, $orderItems, $user)
    {
        $this->products = $products;
        $this->orderItems = $orderItems;
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $products = $this->products;
        $order = $this->order;
        $orderItems = $this->orderItems;

        if (Auth::guard('customer')->user() != null) {

            $user = $this->user;

            return $this->from("Omar2345siaj@gmail.com")->view('pages.email-template-order', compact('products', 
                'order', 'orderItems', 'user'));

        } else {
           
            return $this->from("Omar2345siaj@gmail.com")->view('pages.email-template-order', compact('products', 
                'order', 'orderItems'));
        }
        
    }
}

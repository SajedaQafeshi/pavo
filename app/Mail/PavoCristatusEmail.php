<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PavoCristatusEmail extends Mailable
{
    use Queueable, SerializesModels;
   
    private $title, $body, $image, $discount;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $body, $image, $discount)
    {
        $this->title = $title;
        $this->image = $image;
        $this->body = $body;
        $this->discount = $discount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = $this->title;
        $discount = $this->discount;
        $body = $this->body;
        $image = $this->image;
        
        return $this->from("Omar2345siaj@gmail.com")->view('email-template', compact('title', 
            'discount', 'image', 'body'));
    }
}

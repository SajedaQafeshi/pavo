<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PavoCristatusEmail;

class EmailController extends Controller
{
    public function sendEmail() {

        $to_email = "p6507@ppu.edu.ps";

        Mail::to($to_email)->send(
            
            new PavoCristatusEmail()
        );

        return "<p> Success! Your E-mail has been sent.</p>";

    }
}

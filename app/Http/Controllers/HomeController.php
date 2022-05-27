<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    //
    public function index()
    {
        $email = 'demo@gmail.com';
        $name="pawan";
        $body="<p>hello</p>";
        Mail::send([], [], function($message) use ($name, $email,$body) {
            $message->to($email, $name)
                    ->subject("Account Activation")
                    ->from(env('MAIL_FROM_ADDRESS'), 'DoNotReply')
                    ->html($body);
        });
        echo "Basic Email Sent. Check your inbox.";
        
       
        
    }
}

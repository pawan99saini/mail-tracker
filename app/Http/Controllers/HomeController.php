<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    //
    public function index()
    {
        $email = 'pawan99saini@gmail.com';
        $name="pawan";
        $body="<p>hello</p>";
        Mail::send([], [], function($message) use ($name, $email,$body) {
            $message->to($email, $name)
                    ->subject("Account Activation")
                    ->from(env('MAIL_FROM_ADDRESS'), 'DoNotReply')
                    ->html($body);
        });
        echo "Basic Email Sent. Check your inbox.";
        
        // Mail::raw('Hi, welcome user!', function ($message) {
        //     $message->to('pawan99saini@gmail.com')
        //       ->subject('Hello');
        //   })->send();
        //   if (Mail::failures()) {
        //     echo "Basic Email Sent. Check your inbox.";
        //   }
        
    }
}

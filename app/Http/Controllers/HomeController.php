<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\MailTrack;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $email = 'demo@gmail.com';
        // $name="pawan";
        // $body="<p>hello</p>";
        // Mail::send([], [], function($message) use ($name, $email,$body) {
        //     $message->to($email, $name)
        //             ->subject("Account Activation")
        //             ->from(env('MAIL_FROM_ADDRESS'), 'DoNotReply')
        //             ->html($body);
        // });
        // echo "Basic Email Sent. Check your inbox.";
        
       
        
    }

    public function mailTrack($token)
    {
        $date = Carbon::now('Asia/Kolkata');
        $data = MailTrack::where('email_track_code',$token)->first();
       $opens = $data->opens ? $data->opens+1 : 1;
        $email_open_datetime = $date->format('Y-m-d H:i:s');
        MailTrack::where('email_track_code', $token)
      ->update(['email_open_datetime' =>$email_open_datetime,'email_status'=>1,'opens'=>$opens]);
 
    }
}

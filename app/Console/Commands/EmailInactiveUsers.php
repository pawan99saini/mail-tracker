<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\EmailScheduler;
use App\Models\Lead;
use App\Models\MailTrack;
use App\Notifications\NotifyUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;
use Mail;
use URL;




class EmailInactiveUsers extends Command
{

    protected $signature = 'email:users';

    protected $description = 'Email to Inactive Users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try{
            $result = EmailScheduler::orderby('id','desc')->with('templates','groups')->whereDate('schedule_time', '=', \Carbon\Carbon::today()->toDateString())->where('status',0)->get();
            foreach($result as $k=>$val)
            {
                $leads = Lead::select('email','name')->where('category_id',$val->groups->category_id)->get();
                foreach($leads as $lead)
                {
                $email = $lead->email;
                $name = $lead->name;
                $arr1 = ['Name','Email'];
                $arr2 = [$name,$email];
                $body = str_replace($arr1, $arr2,$val->templates->description);
                $track_code = md5(rand());
                $body .= '<img src='.URL::route('mailtrack',[$track_code]).' width="1" height="1" />';   
             file_put_contents(resource_path('views/emails/email-template.blade.php'), $body);
           $res= Mail::send('emails.email-template', [], function($message) use ($email,$val)
                {    
                    $message->to($email)->subject($val->email_subject);    
                });
                if ($res) {
                    $status = 1;
                }
                else{
                    $status = 2; 
                }
                       $mail = new MailTrack;
                       $mail->receiver_email = $email;
                       $mail->email_track_code = $track_code;
                       $mail->email_subject = $val->email_subject;
                       $mail->email_body = $body;
                       $mail->status = $status;
                       $mail->schedule_id = $val->id;
                       $mail->schedule_time = \Carbon\Carbon::now()->toDateTimeString();
                       $mail->save();
                       $e= EmailScheduler::find($val->id);
                       $e->status = $status;
                       $e->save();
            }
            }


        }
        catch (Exception $e) {
            Log::alert($e);
        }
    }
}


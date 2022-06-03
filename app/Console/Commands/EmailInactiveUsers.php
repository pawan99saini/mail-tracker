<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\EmailScheduler;
use App\Models\Lead;
use App\Notifications\NotifyUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;
use Mail;

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
            $result = EmailScheduler::orderby('id','desc')->with('templates','groups')->get();
            $emails = [];
            foreach($result as $k=>$val)
            {
             file_put_contents(resource_path('views/emails/email-template.blade.php'), $val->templates->description);
            $email = Lead::select('email')->where('category_id',$val->groups->category_id)->first();
            Mail::send('emails.email-template', [], function($message) use ($email)
                {    
                    $message->to($email->email)->subject('This is test e-mail');    
                });
            }


        }
        catch (Exception $e) {
            Log::alert($e);
        }
    }
}


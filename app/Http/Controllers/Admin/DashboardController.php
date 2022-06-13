<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\MailTrack;
use App\Models\EmailScheduler;
use Illuminate\Database\Eloquent\Builder;


class DashboardController extends Controller
{

	public function __construct()
	{
        $this->middleware('admin');
	}

    public function index(Request $request)
    {
        
        
                
        $emails = DB::table('email_schedulers')
        ->join('mail_tracks', 'email_schedulers.id', '=', 'mail_tracks.schedule_id')
        ->selectRaw('sum(mail_tracks.opens) as open_count,sum(email_status) as click_count, email_schedulers.title')
        ->groupBy('email_schedulers.id')
        ->orderBy('email_schedulers.id', 'desc')
        ->paginate(10);
    	return view('admin.dashboard',compact('emails'));
    }

  
}

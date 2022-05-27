<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\SentEmail;

class DashboardController extends Controller
{

	public function __construct()
	{
        $this->middleware('admin');
	}

    public function index(Request $request)
    {
        $search =  $request->input('search');
        if($search!=""){
            $emails = SentEmail::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $emails->appends(['search' => $search]);
        }
        else{
            $emails = SentEmail::orderby('id','desc')->paginate(10);

        }
    	return view('admin.dashboard',compact('emails'));
    }

  
}

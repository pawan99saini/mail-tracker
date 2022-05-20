<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class DashboardController extends Controller
{

	public function __construct()
	{
        $this->middleware('admin');
	}

    public function index()
    {
    	return view('admin.dashboard');
    }

  
}
<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Session;
use Validator;
class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }



    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ],

            );
            if ($validator->passes()) {
                $data=$request->all();
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

                    return redirect('admin/dashboard');
                }
                else
                {
                    Session::flash('error','Email or password is incorrect');
                    return redirect()->back()->withInput($request->all());
                }
            }
            else
            {
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }

        }
        return view('auth.admin-login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result = User::orderByDesc('id')->Paginate(10);
        return view('backend.user.index', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function questions() {
        $result = User::orderByDesc('id')->Paginate(10);

        $questions = DB::table('user_answers')
                ->select('user_answers.*', 'u.name', 'q.question', 'q.option_1', 'q.option_2', 'q.option_3', 'q.option_4', 'q.correct_answer')
                ->leftjoin("users as u", "u.id", "=", "user_answers.user_id")
                ->leftjoin("questions as q", "q.id", "=", "user_answers.que_id")
                ->Paginate(10);

        return view('backend.user.questions', ['result' => $questions]);
    }

    public function send_email($id) {
        $user = User::where('id', $id)->first();

        if (!empty($user)) {
//            User::where('id', $id)->update(['status' => 1, 'password' => Hash::make(123456)]);
//            return redirect('admin/users')->with('success', 'User activated Successfully.....');

            $password = uniqid();
            $body = "Hello " . $user->name . "<br/>";
            $body .= "<p>Your account is activated.</p>";
            $body .= "<p>Click <a href='" . url('/') . "'>here</a> to login</p>";

            $body .= "<p>Your login details is below</p>";
            $body .= "<b>Email : </b>" . $user->email . "<br/>";
            $body .= "<b>password : </b>" . $password;
            $email['email'] = $user->email;
            $email['body'] = $body;
            $name = $user->name;
            $email = $user->email;
            Mail::send([], [], function($message) use ($name, $email,$body) {
                $message->to($email, $name)
                        ->subject('Subject')
                        ->from('no-reply@optinsearch.com', 'DoNotReply')
                        ->setBody($body, 'text/html');
            });

            /* $send = Mail::send([], [], function ($message) use ($email) {
              $message->to($email['email'])
              ->subject("Account Activation")
              // here comes what you want
              ->setBody($email['body'], 'text/html'); // assuming text/plain
              }); */
            // check for failures						// die('asas');
            if (Mail::failures()) {
                return redirect('admin/users')->with('error', 'Email sending failed');
            } else {
                User::where('id', $id)->update(['status' => 1, 'password' => Hash::make($password)]);
                return redirect('admin/users')->with('success', 'User activated Successfully.....');
            }
        }
    }

}

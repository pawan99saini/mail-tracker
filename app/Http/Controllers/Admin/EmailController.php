<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SentEmail;
use App\Models\User;
use App\Models\Category;
use App\Models\Lead;
use Mail;
use File;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    	return view('admin.emails.index',compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::select('id','title')->where('status',1)->get();
        $users = Lead::select('id','email')->where('status',1)->get();
        return view('admin.emails.compose',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'to' => 'required',
            'category_id'=>'required',
			'template_id'=>'required',
            'subject'=>'required',
            'message'=>'required'
           
        ],
        [
            'category_id.required' => 'Category is required',
            'template_id.required' => 'Template is required'
        ]
    );

    $data = $request->all();
    $data['filename'] = NULL;
    if($request->hasFile('attachment'))
    {
        $path = public_path('uploads');
        $attachment = $request->file('attachment');
        $name = time().'.'.$attachment->getClientOriginalExtension();;
        // create folder
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $attachment->move($path, $name);
        $filename = $path.'/'.$name;
        $data['filename'] = $filename;

    }
   // print_r($data);die; 
    //send mail 
    foreach($data['to'] as $val)
    {
    $email = $val;
    $name =   Lead::where('email',$email)->value('name');
    $arr1 = ['Name','Email'];
    $arr2 = [$name,$email];
    $body = str_replace($arr1, $arr2, $data['message']);
    file_put_contents(resource_path('views/emails/email-template.blade.php'), $body);

Mail::send('emails.email-template', ['data' => $data], function($message) use ($data,$email)
{    
    if($data['filename']) {
        $message->to($email)->subject($data['subject'])->attach($data['filename']); 
    }
    else{
        $message->to($email)->subject($data['subject']); 
    }
       
});
    }
return redirect('admin/emails')->with('success','New Record Add Successfully.....');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

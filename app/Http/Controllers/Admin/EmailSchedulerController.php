<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailScheduler;
use App\Models\Group;
use App\Models\Template;
use Carbon\Carbon;


class EmailSchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search =  $request->input('search');
        if($search!=""){
            $result = EmailScheduler::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')->
                with('templates','groups');
                    
            })
            ->paginate(10);
            $result->appends(['search' => $search]);
        }
        else{
            $result = EmailScheduler::orderby('id','desc')->with('templates','groups')->paginate(10);

        }
      // dd($result);
        return view('admin.emailscheduler.index', ['data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $group = Group::select('title','id')->where('status',1)->get();
        $template = Template::select('title','id')->where('status',1)->get();
        return view('admin.emailscheduler.create',compact('group','template'));
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
        $this->validate($request, [
            'title' => 'required',
            'group_id' => 'required',
            'template_id' => 'required',
            'schedule_time' => 'required',
        ]);

        $input = $request->all();
        Carbon::createFromFormat('Y-m-d H:i',$input['schedule_time'])->toDateTimeString();
        EmailScheduler::create($input);
        return redirect()->route('emailscheduler.index')->with('success','Emailscheduler created successfully');
       
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

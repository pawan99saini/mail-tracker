<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\LeadCategory;

class GroupController extends Controller
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
            $result = Group::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $result->appends(['search' => $search]);
        }
        else{
            $result = Group::orderby('id','desc')->paginate(10);

        }
       
        return view('admin.group.index', ['data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = LeadCategory::select('id','name')->where('status',1)->get();
        return view('admin.group.create',compact('category'));
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
            'category_id' => 'required',
        ]);
    
        $input = $request->all();
        $input['status'] =  !empty($input['status']) ? 1 : 0 ;

        Group::create($input);
        return redirect()->route('groups.index')->with('success','LeadCategory created successfully');
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
        $group= Group::find($id);
        $category = LeadCategory::select('id','name')->where('status',1)->get();
        return view('admin.group.edit',compact('group','category'));
    }

  
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
        ]);
    
        $input = $request->all();
        $input['status'] =  !empty($input['status']) ? 1 : 0 ;
        $group= Group::find($id);
        $group->update($input);
        return redirect()->route('emailscheduler.index')->with('success','Group update successfully');
    }

    public function destroy($id)
    {
        //
        if(Group::find($id)->delete())
        {
            return back()->with('success','Deleted successfully');

        }
    }
}

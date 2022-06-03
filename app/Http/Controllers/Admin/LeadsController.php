<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadCategory;

class LeadsController extends Controller
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
            $result = Lead::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $result->appends(['search' => $search]);
        }
        else{
            $result = Lead::orderby('id','desc')->paginate(10);

        }
       
        return view('admin.leads.index', ['data' => $result]);
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
        return view('admin.leads.create',compact('category'));
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
            'name' => 'required',
            'email' => 'required|email|unique:leads,email',
        ]);
    
        $input = $request->all();
        $input['status'] =  $input['status'] ? 1 : 0 ;

        Lead::create($input);
        return redirect()->route('leads.index')->with('success','LeadCategory created successfully');
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
        $lead= Lead::find($id);
        $category = LeadCategory::select('id','name')->where('status',1)->get();
        return view('admin.leads.edit',compact('category','lead'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:leads,email,'.$id,
           
        ]);
    
        $input = $request->all();
        $input['status'] =  $input['status'] ? 1 : 0 ;
        $user = Lead::find($id);
        $user->update($input);
        return redirect()->route('leads.index')->with('success','LeadCategory update successfully');  
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

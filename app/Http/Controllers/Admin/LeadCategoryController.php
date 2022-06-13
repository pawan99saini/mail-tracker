<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadCategory;

class LeadCategoryController extends Controller
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
            $leadscategory = LeadCategory::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $leadscategory->appends(['search' => $search]);
        }
        else{
            $leadscategory = LeadCategory::orderby('id','desc')->paginate(10);

        }
      
        return view('admin.leadscategory.index')->with([
            'leadscategory'  => $leadscategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.leadscategory.create');
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
            'name' => 'required',
        ]
		);

        $page = new LeadCategory;
        $page->name = $request->name;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();
        return redirect('admin/leadscategory')->with('success','New Record Add Successfully.....');
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
        $leadscategory = LeadCategory::where('id',$id)->first();
        return view('admin.leadscategory.edit',compact('leadscategory'));
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
        $request->validate([
            'name' => 'required',
        ]
		);

        $page = LeadCategory::where('id',$id)->first();
        $page->name = $request->name;
        $page->status = $request->status =='on' ? 1 :0;
        $page->save();
        return redirect('admin/leadscategory')->with('success','Update Successfully.....');
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
        if(LeadCategory::find($id)->delete())
        {
            return back()->with('success','Deleted successfully');

        }
    }
}

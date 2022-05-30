<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCategory;

class UserCategoryController extends Controller
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
            $usercategory = UserCategory::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $usercategory->appends(['search' => $search]);
        }
        else{
            $usercategory = UserCategory::orderby('id','desc')->paginate(10);

        }
      
        return view('admin.usercategory.index')->with([
            'usercategory'  => $usercategory
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
        return view('admin.usercategory.create');
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

        $page = new UserCategory;
        $page->name = $request->name;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();


        return redirect('admin/usercategory')->with('success','New Record Add Successfully.....');
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
        $usercategory = UserCategory::where('id',$id)->first();
        return view('admin.usercategory.edit',compact('usercategory'));
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

        $page = UserCategory::where('id',$id)->first();
        $page->name = $request->name;
        $page->status = $request->status =='on' ? 1 :0;
        $page->save();

        return redirect('admin/usercategory')->with('success','Update Successfully.....');
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

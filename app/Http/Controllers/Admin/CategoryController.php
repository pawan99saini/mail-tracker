<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $search =  $request->input('search');
        if($search!=""){
            $category = Category::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $category->appends(['search' => $search]);
        }
        else{
            $category = Category::orderby('id','desc')->paginate(10);

        }
        return view('admin.category.index')->with([
            'category'  => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $request->validate([
            'title' => 'required',
            'order_no' => 'required',
			
           
        ]
		);

        $page = new Category;
        $page->title = $request->title;
        $page->order_no = $request->order_no;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();


        return redirect('admin/category')->with('success','New Record Add Successfully.....');
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
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit', compact('category'));
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
        $request->validate([
            'title' => 'required',
			 'order_no' => 'required'
          
        ],
	
		);

        
        $page = Category::where('id',$id)->first();
        $page->title = $request->title;
		$page->order_no = $request->order_no;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();
        return redirect()->route('category.index')->withSuccess('You have successfully updated a Page!');

       
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
         Category::find($id)->delete();
         return back()->with('success','Category deleted successfully');
    }
	
	
}

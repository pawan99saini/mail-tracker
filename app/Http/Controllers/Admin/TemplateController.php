<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Category;

class TemplateController extends Controller
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
            $template = Template::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
                    
            })
            ->paginate(10);
            $template->appends(['search' => $search]);
        }
        else{
            $template = Template::orderby('id','desc')->paginate(10);

        }
      
        return view('admin.template.index')->with([
            'template'  => $template
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
        $category = Category::select('title', 'id')->where('status',1)->get();
        return view('admin.template.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id'=>'required',
			'order_no'=>'required',
            'desc'=>'required'
           
        ]
		);

        $page = new Template;
        $page->title = $request->title;
		$page->order_no = $request->order_no;
        $page->category_id = $request->category_id;
        $page->description = $request->desc;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();

        return redirect('admin/template')->with('success','New Record Add Successfully.....');
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
        $template = Template::where('category_id',$id)->get();
        return response()->json([
            'template' => $template
        ]);
    }

    public function getContent($id)
    {
        $template = Template::where('id',$id)->first();
        return response()->json([
            'template' => $template
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::select('title', 'id')->where('status',1)->get();
        $template = Template::where('id',$id)->first();
        return view('admin.template.edit',compact('category','template'));
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
            'category_id'=>'required',
			'order_no'=>'required',
            'desc'=>'required'
           
        ]
		);

        $page = Template::where('id',$id)->first();
        $page->title = $request->title;
        $page->category_id = $request->category_id;
        $page->description = $request->desc;
		$page->order_no = $request->order_no;
        $page->status = $request->status =='on'? 1 :0;
        $page->save();

        return redirect('admin/template')->with('success','New Record Add Successfully.....');
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

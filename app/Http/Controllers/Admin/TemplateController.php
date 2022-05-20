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
    public function index()
    {
        $template = Template::paginate(10);
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
            'desc'=>'required'
           
        ]
		);

        $page = new Template;
        $page->title = $request->title;
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
            'desc'=>'required'
           
        ]
		);

        $page = Template::where('id',$id)->first();
        $page->title = $request->title;
        $page->category_id = $request->category_id;
        $page->description = $request->desc;
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

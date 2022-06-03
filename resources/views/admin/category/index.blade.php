@extends('admin.layouts.admin')
@section('title', 'Category');
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category
				<a href="{{url('admin/category/create')}}" class="btn bg-gradient-primary btn-sm">Create Category</a>
				</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('category.index') }}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
                <div class="card-tools">
                  <form method="get" action="{{url('admin/category')}}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" value="{{request()->get('search') ? request()->get('search') : ''}}" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($category as $key=>$cat)
                    <tr>
                      <td>{{$key+ $category->firstItem() }}</td>
                      <td>{{$cat->title}}</td>
                      <td>{{$cat->created_at}}</td>
                      <td>{{$cat->status==1 ? 'Active' : 'Deactive'}}</td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{route('category.edit',$cat->id)}}"><i class="fas fa-edit"></i></a>
                        <form  action="{{route('category.destroy',$cat->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="javascript:" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></a>
                      </form>
					  </td>
                    </tr>
                   @endforeach
                  </tbody>
				    
                </table>
				
              </div>
			
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
     <div class="row">
	 {!! $category->links() !!}
	 </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
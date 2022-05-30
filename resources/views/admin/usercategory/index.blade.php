@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>UserCategory
			<a href="{{url('admin/usercategory/create')}}" class="btn bg-gradient-primary btn-sm">Create UserCategory</a>

			</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">UserCategory</li>
            </ol>
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
                <h3 class="card-title">UserCategory</h3>

                <div class="card-tools">
                  <form method="GET" action="{{url('admin/usercategory')}}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" value="{{request()->get('search') ? request()->get('search') : ''}}" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($usercategory as $key=>$t)
                    <tr>
                        <td>{{$key+ $usercategory->firstItem() }}</td>
                      <td>{{$t->name}}</td>
                      <td>{{$t->created_at}}</td>
                      <td>{{$t->status==1 ? 'Active' : 'Deactive'}}</td>
                      <td>
					  <a class="btn btn-app" href="{{route('usercategory.edit',$t->id)}}"><i class="fas fa-edit"></i> Edit</a>
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
	 {!! $usercategory->links() !!}
	 </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
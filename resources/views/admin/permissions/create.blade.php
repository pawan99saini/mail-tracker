@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permission</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('permissions.create') }}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
       <div class="row">
           <div class="col-md-10">
           <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{url('admin/permissions')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Name</label>
                    
                      <input type="text" class="form-control" name="name" id="inputEmail3" value="{{ old('name')}}" placeholder="Name" >
                      @if ($errors->has('name'))
                    <span class="text-danger">
                    {{ $errors->first('name') }}
                    </span>
                    @endif
                   
                  </div>
				  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
           </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
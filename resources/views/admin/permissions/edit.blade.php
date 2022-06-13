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
            {{ Breadcrumbs::render('permissions.edit',$permission) }}
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
                <h3 class="card-title">Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{route('permissions.update',$permission->id)}}">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                      
                        <input type="text" class="form-control" name="name" id="inputEmail3" value="{{$permission->name}}" placeholder="Name" >
                        @if ($errors->has('name'))
                      <span class="text-danger">
                      {{ $errors->first('name') }}
                      </span>
                      @endif
                     
                    </div>
            
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                 
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
@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leads Category</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('leadscategory.edit',$leadscategory) }}
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
              <form class="form-horizontal" method="post" action="{{route('leadscategory.update',$leadscategory->id)}}">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Name</label>
                    
                      <input type="text" class="form-control" name="name" id="inputEmail3" value="{{$leadscategory->name}}" placeholder="Title" >
                      @if ($errors->has('name'))
                    <span class="text-danger">
                    {{ $errors->first('name') }}
                    </span>
                    @endif
                    
                  </div>
				
                  <div class="form-group">
                  <label  class="col-form-label">Status</label>
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="status" type="checkbox" {{$leadscategory->status==1 ? 'checked':''}}/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>
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
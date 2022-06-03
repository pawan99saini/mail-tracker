@extends('admin.layouts.admin')
@section('title', 'Add Category');
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('category.create') }}
            
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
              <form class="form-horizontal" method="post" action="{{url('admin/category')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="inputEmail3" value="{{ old('title')}}"placeholder="Title" >
                      @if ($errors->has('title'))
                    <span class="text-danger">
                    {{ $errors->first('title') }}
                    </span>
                    @endif
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="order_no" class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="order_no" id="order_no" value="{{ old('order_no')}}" min="1">
                      @if ($errors->has('order_no'))
                    <span class="text-danger">
                    {{ $errors->first('order_no') }}
                    </span>
                    @endif
                    </div>
                  </div>
                  Status
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="status" type="checkbox" checked/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
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
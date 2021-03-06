@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Template</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('template.edit',$template) }}
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
              <form class="form-horizontal" method="post" action="{{route('template.update',$template->id)}}">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Title</label>
                    
                      <input type="text" class="form-control" name="title" id="inputEmail3" value="{{ $template->title}}"placeholder="Title" >
                      @if ($errors->has('title'))
                    <span class="text-danger">
                    {{ $errors->first('title') }}
                    </span>
                    @endif
                    
                  </div>
                  <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id">
                          <option value="">Select</option>
                          @foreach($category as $cat)
                          <option value="{{$cat->id}}" {{ $cat->id ==$template->category_id ? 'selected' : ''}} >{{$template->title}}</option>
                          @endforeach
                         
                        </select>
                        @if ($errors->has('category_id'))
                    <span class="text-danger">
                    {{ $errors->first('category_id') }}
                    </span>
                    @endif
                      </div>
                      <div class="form-group ">
                        <label>Description</label>
                      </br>
                      <span class="addElement btn-dark btn-sm">Name</span>
                      <span class="addElement btn-dark btn-sm">Email</span>
                        
                        <textarea class="form-control textarea" name="desc" rows="3" placeholder="Enter ...">{{$template->description}}</textarea>
                        @if ($errors->has('desc'))
                    <span class="text-danger">
                    {{ $errors->first('desc') }}
                    </span>
                    @endif
                      </div>
					      <div class="form-group">
                    <label for="order_no" class="col-form-label">Order</label>
                    
                      <input type="number" class="form-control" name="order_no" id="order_no" value="{{$template->order_no}}" min="1">
                      @if ($errors->has('order_no'))
                    <span class="text-danger">
                    {{ $errors->first('order_no') }}
                    </span>
                    @endif
                    
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                  
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="status" type="checkbox"  {{$template->status==1 ? 'checked' : ''}}/>
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
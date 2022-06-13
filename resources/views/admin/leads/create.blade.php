@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Leads</h1>
                    </div>
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('leads.create') }}
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
                            <form class="form-horizontal" method="post" action="{{ url('admin/leads') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-form-label">Name</label>
                                       
                                            <input type="text" class="form-control" name="name" id="inputEmail3"
                                                value="{{ old('name') }}" placeholder="Name">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Email" class=" col-form-label">Email</label>
                                        
                                            <input type="email" class="form-control" name="email" id="Email"
                                                value="{{ old('email') }}" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-form-label">Mobile</label>
                                        
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                value="{{ old('mobile') }}" min="1">
                                            @if ($errors->has('mobile'))
                                                <span class="text-danger">
                                                    {{ $errors->first('mobile') }}
                                                </span>
                                            @endif
                                        
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-form-label">Select Category</label>
                                        <select class="form-control" name="category_id">
                                          <option value="">Select</option>
                                          @foreach($category as $cat)
                                          <option value="{{$cat->id}}" {{ $cat->id ==old('category_id') ? 'selected' : ''}} >{{$cat->name}}</option>
                                          @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                    <span class="text-danger">
                                    {{ $errors->first('category_id') }}
                                    </span>
                                    @endif
                                      </div>
                                      <div class="form-group">
                                    
                                    <label  class="col-form-label">Status</label>

                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionSuccess" name="status" type="checkbox" checked />
                                        <label for="someSwitchOptionSuccess" class="label-success"></label>
                                    </div>
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

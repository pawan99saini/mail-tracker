@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                    <div class="col-md-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="{{ url('admin/users') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="inputEmail3"
                                                value="{{ old('name') }}" placeholder="Name">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="Email"
                                                value="{{ old('email') }}" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                value="{{ old('mobile') }}" min="1">
                                            @if ($errors->has('mobile'))
                                                <span class="text-danger">
                                                    {{ $errors->first('mobile') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="{{ old('password') }}" >
                                            @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="confirm-password" id="confirm-password"
                                                value="{{ old('confirm-password') }}" >
                                            @if ($errors->has('confirm-password'))
                                                <span class="text-danger">
                                                    {{ $errors->first('confirm-password') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Select Role</label>
                                      <select name="roles[]" class="select2" multiple="multiple" data-placeholder="Select Role" style="width: 100%;">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                      </select>
                                      @if ($errors->has('roles'))
                                      <span class="text-danger">
                                          {{ $errors->first('roles') }}
                                      </span>
                                  @endif
                                      </div>
                                    Status
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionSuccess" name="status" type="checkbox" checked />
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

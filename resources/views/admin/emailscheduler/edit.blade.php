@extends('admin.layouts.admin')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>EmailScheduler</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">EmailScheduler</li>
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
                                <h3 class="card-title">Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                            action="{{route('emailscheduler.update',$emailscheduler->id)}}">
                                @csrf
                                @method('PUT') 
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                        
                                            <input type="text" class="form-control" name="title" id="inputEmail3"
                                                value="{{ $emailscheduler->title }}" placeholder="Title">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">
                                                    {{ $errors->first('title') }}
                                                </span>
                                            @endif
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email Subject</label>
                                        
                                            <input type="text" class="form-control" name="email_subject" id="inputEmail3"
                                                value="{{ $emailscheduler->email_subject }}" placeholder="Email Subject">
                                            @if ($errors->has('email_subject'))
                                                <span class="text-danger">
                                                    {{ $errors->first('email_subject') }}
                                                </span>
                                            @endif
                                        
                                    </div>
                                    <div class="form-group" >
                                        <label>Select Group</label>
                                        <select class="form-control" name="group_id">
                                          <option value="">Select</option>
                                          @foreach($group as $cat)
                                          <option value="{{$cat->id}}" {{ $cat->id ==$emailscheduler->group_id  ? 'selected' : ''}} >{{$cat->title}}</option>
                                          @endforeach
                                        </select>
                                        @if ($errors->has('template_id'))
                                    <span class="text-danger">
                                    {{ $errors->first('template_id') }}
                                    </span>
                                    @endif
                                      </div>
                                       <div class="form-group" >
                                        <label>Select Template</label>
                                        <select class="form-control" name="template_id">
                                          <option value="">Select Template</option>
                                          @foreach($template as $cat)
                                          <option value="{{$cat->id}}" {{ $cat->id ==$emailscheduler->template_id ? 'selected' : ''}} >{{$cat->title}}</option>
                                          @endforeach
                                        </select>
                                        @if ($errors->has('template_id'))
                                    <span class="text-danger">
                                    {{ $errors->first('template_id') }}
                                    </span>
                                    @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Date and time:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" value="{{$emailscheduler->schedule_time}}" class="form-control datetimepicker-input" name="schedule_time" data-target="#reservationdatetime">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        </div>
                                        </div>
                                        @if ($errors->has('schedule_time'))
                                        <span class="text-danger">
                                        {{ $errors->first('schedule_time') }}
                                        </span>
                                        @endif
                                   
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

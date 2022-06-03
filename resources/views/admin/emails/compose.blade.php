@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('emails.create') }}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
     <div>
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Compose New Message</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form class="form-horizontal" method="post" action="{{ url('admin/emails') }}" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
             
              <select  name="to[]" class="select2" multiple="multiple" data-placeholder="Select To" style="width: 100%;">
                <option value="">To:</option>
                @foreach($users as $k=>$user)
                <option value="{{$user->email}}" {{ $user->email ==old('to') ? 'selected' : ''}} >{{$user->email}}</option>
                @endforeach
               
              </select>
              @if ($errors->has('to'))
              <span class="text-danger">
              {{ $errors->first('to') }}
              </span>
              @endif
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" placeholder="Subject:">
              @if ($errors->has('subject'))
              <span class="text-danger">
              {{ $errors->first('subject') }}
              </span>
              @endif
            </div>
            <div class="form-group" >
              <select class="form-control" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $k=>$cat)
                <option value="{{$cat->id}}" {{ $cat->id ==old('category_id') ? 'selected' : ''}} >{{$cat->title}}</option>
                @endforeach
               
              </select>
              @if ($errors->has('category_id'))
          <span class="text-danger">
          {{ $errors->first('category_id') }}
          </span>
          @endif
            </div>   
                  <div class="form-group" >
              <select class="form-control" name="template_id">
                <option value="">Select Template</option>
              </select>
              @if ($errors->has('template_id'))
          <span class="text-danger">
          {{ $errors->first('template_id') }}
          </span>
          @endif
            </div>
            <div class="form-group">
            </br>
            <span class="addElement btn-dark btn-sm">Name</span>
            <span class="addElement btn-dark btn-sm">Email</span>
                <textarea class="form-control textarea" name="message">
                  
                </textarea>
                @if ($errors->has('template_id'))
                <span class="text-danger">
                {{ $errors->first('template_id') }}
                </span>
                @endif
            </div>
            <div class="form-group">
              <div class="btn btn-default btn-file">
                <i class="fas fa-paperclip"></i> Attachment
                <input type="file" name="attachment">
              </div>
              <p class="help-block">Max. 32MB</p>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
            </div>
          </div>
          <!-- /.card-footer -->
        </form>
        </div>
        <!-- /.card -->
      </div>
     </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
@extends('admin.layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Email
              <a href="{{url('admin/emails/create')}}" class="btn bg-gradient-primary btn-sm">Compose</a>

            </h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('emails.index') }}
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
                <h3 class="card-title">Email</h3>

                <div class="card-tools">
                  <form method="GET" action="{{url('admin/dashboard')}}">
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
                      <th>No.</th>
                      <th>Recipient Email</th>
                      <th>Email Subject</th>
                      <th>Open</th>
                      <th>Date</th>    
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($emails as $key=>$email)
                    <tr>
                        <td>{{$key+ $emails->firstItem() }}</td>
                      <td>{{$email->receiver_email}}</td>
                      <td>{{$email->email_subject}}</td>
                      <td>{{$email->email_status==1 ? 'Yes' : 'No'}}</td>
                      <td>{{$email->email_open_datetime}}</td>
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
	 {!! $emails->links() !!}
	 </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EmailScheduler
				<a href="{{url('admin/emailscheduler/create')}}" class="btn bg-gradient-primary btn-sm">Create EmailScheduler</a>
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
                <h3 class="card-title">EmailScheduler</h3>
                <div class="card-tools">
                  <form method="get" action="{{url('admin/emailscheduler')}}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search"  value="{{request()->get('search') ? request()->get('search') : ''}}" class="form-control float-right" placeholder="Search">

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
                      <th>No</th>
                      <th>Title</th>
                      <th>Template</th>
                      <th>Customer Group</th>
                      <th>Schedule Date Time</th>
                      <th>Status</th>
                     
                    </tr>
                    @foreach ($data as $key => $val)
                    @php
                    switch ($val->status) {
                      case 0:
                          $status = '<span class="badge bg-primary">Pending</span>';
                          break;
                      case 1:
                      $status = '<span class="badge bg-success">Pending</span>';
                          break;
                      case 2:
                      $status = '<span class="badge bg-danger">Danger</span>';
                          break;
                  }
                    
                        
                    @endphp
                     <tr>
                       <td>{{$key+1 }}</td>
                       <td>{{ $val->title }}</td>
                       <td>{{ $val->templates->title }}</td>
                       <td>{{ $val->groups->title }}</td>
                       <td>{{ $val->schedule_time }}</td>
                       <td>{!! $status !!}</td>
                       
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
	 {!! $data->links() !!}
	 </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
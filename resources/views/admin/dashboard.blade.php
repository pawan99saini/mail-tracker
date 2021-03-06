@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('dashboard') }}
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
                <h3 class="card-title">Dashboard</h3>

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
                      <th>Title </th>
                      <th>Open Count</th>
                      <th>Click count</th>
                      <th>Register Count</th>
                    
                      
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($emails as $key=>$email)
                    <tr>
                        <td>{{$key+ $emails->firstItem() }}</td>
                        <td>{{$email->title}}</td>
                      <td>{{$email->open_count}}</td>
                      <td>{{$email->click_count}}</td>
                      <td>{{$email->register_count}}</td>
                      
                     
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
   <div class="chart">
    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
	 </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leads
				<a href="{{url('admin/leads/create')}}" class="btn bg-gradient-primary btn-sm">Create Leads</a>
				</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('leads.index') }}
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
                <h3 class="card-title">Leads</h3>
                <div class="card-tools">
                  <form method="get" action="{{url('admin/users')}}">
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $val)
                     <tr>
                       <td>{{$key+1 }}</td>
                       <td>{{ $val->name }}</td>
                       <td>{{ $val->email }}</td>
                       <td>{{ $val->mobile }}</td>
                       <td>
                          <a class="btn btn-sm btn-primary" href="{{route('leads.edit',$val->id)}}"><i class="fas fa-edit"></i></a>
                          <form  action="{{route('leads.destroy',$val->id)}}" method="POST" style="display:none">
                            @csrf
                            @method('DELETE')
                           
                        </form>
                        <a href="javascript:" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></a>
                       </td>
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
@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User
				<a href="{{url('admin/users/create')}}" class="btn bg-gradient-primary btn-sm">Create User</a>
				</h1>
          </div>
          <div class="col-sm-6">
            {{ Breadcrumbs::render('users.index') }}
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
                <h3 class="card-title">User</h3>
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
                      <th>Roles</th>
                      <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                     <tr>
                       <td>{{$key+1 }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                       <td>
                         @if(!empty($user->getRoleNames()))
                           @foreach($user->getRoleNames() as $v)
                              <label class="badge badge-success">{{ $v }}</label>
                           @endforeach
                         @endif
                       </td>
                       <td>

                          <a class="btn btn-app" href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit"></i> Edit</a>
                          <form  action="{{route('users.destroy',$user->id)}}" method="POST" style="display:none">
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
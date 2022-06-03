<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
      <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        
          </li>
          <li class="nav-item">
            <a href="{{url('admin/category')}}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Category
     
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/template') || request()->is('admin/emails')) ? 'active' : '' }}">
            <i class="fa fa-envelope" aria-hidden="true"></i>
              <p>
                Emails
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{url('admin/template')}}" class="nav-link {{ (request()->is('admin/template')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Templates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/emails')}}" class="nav-link {{ (request()->is('admin/emails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Emails</p>
                </a>
              </li>
            </ul>
          </li>  
		  <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/users') || request()->is('admin/roles') || request()->is('admin/permissions')) ? 'active' : '' }}">
            <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{url('admin/users')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{url('admin/roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
			          <li class="nav-item">
                <a href="{{url('admin/permissions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/leads') || request()->is('admin/leadscategory')) ? 'active' : '' }}">
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
              <p>
                Leads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{url('admin/leads')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leads</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{url('admin/leadscategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LeadsCategory</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/groups')}}" class="nav-link {{ (request()->is('admin/groups')) ? 'active' : '' }}">
            <i class="fa fa-object-group" aria-hidden="true"></i>
              <p>
                Group
                
              </p>
            </a>
        
          </li> 
          <li class="nav-item">
            <a href="{{url('admin/emailscheduler')}}" class="nav-link {{ (request()->is('admin/emailscheduler')) ? 'active' : '' }}">
            <i class="fa fa-calendar" aria-hidden="true"></i>
              <p>
                EmailScheduler
               
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
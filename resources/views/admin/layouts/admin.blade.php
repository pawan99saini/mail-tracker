<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/css/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
  <style>
    .material-switch > input[type="checkbox"] 
    {
    display: none;   
 }

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
    top:10;
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
.label-success {
    background-color: #5cb85c;
}
.cke_chrome{
    margin-top: 10px !important;
}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.includes.header')
@include('admin.includes.sidebar')

  <!-- Main Sidebar Container -->
 

  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('admin.includes.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/dashboard3.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/tempusdominus-bootstrap-4.min.js')}}"></script>



<script>

var site_url = "{{url('/')}}";
    $(document).ready(function() {

        

    $('.textarea').each(function(){

       

        CKEDITOR.replace( $(this).attr('name') );

        

    })

    $('.select2').select2()
 //Date and time picker
 $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock',
 
},format: 'YYYY-MM-DD hh:mm',
useCurrent: false

 });

 $('.delete').on('click', function (event) {
    event.preventDefault();
    var c = $(this);
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
           
            c.closest('td').find('form').submit();
        }
    });
});

    });

    

</script>

    <!-- End custom js for this page -->

    @if (Session::has('success'))

    <script>

        swal({

            title: "Success!",

            text: "{{ Session::get('success') }}",

            icon: 'success'

        });

    </script>

@endif

@if (Session::has('error'))

    <script>

        swal({

            title: "Error!",

            text: "{{ Session::get('error') }}",

            icon: 'error'

        });

    </script>

@endif
</body>
</html>

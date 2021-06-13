<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if(route('tag.index') )
  <title>Post Page || Here you write short description</title>
  @else
  <title>Dashboard || Here you write short description</title>
  @endif 
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/daterangepicker/daterangepicker.css">
  @yield('style')
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('contents/admin')}}/dist/css/toastr.min.css">
  <link rel="stylesheet" href="{{asset('contents/admin')}}/dist/css/style.css">


  <!-- javascript -->
  <script src="{{asset('contents/admin')}}/plugins/jquery/jquery.min.js"></script>
  <script src="{{asset('contents/admin')}}/dist/js/toastr.min.js"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}",{timeOut: 5000},{toastClass:'tostStyle' },{closeButton:true});
    
    @endif
  
    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}",{timeOut: 5000});
    @endif
  </script>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="{{route('contactus.index')}}">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">
            @php
                echo $contactus=App\Models\Contactus::count();
            @endphp
        </a>
       
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('website.home')}}" class="brand-link">
      <img src="{{asset('contents/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blog Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->image != "")
          <img src="{{asset('uploads/user/'.Auth::user()->image)}}" class="img-circle" alt="User Image" style="height:40px; width:40px;">
          @else
          <img src="{{asset('contents/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
         <h5> <a href="{{route('user.profile')}}" class="d-block text-white text-capitalize">{{Str::words(Auth::user()->name,2,'')}}</a></h5>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link {{(request()->is('dashboard'))?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.profile')}}" class="nav-link {{(request()->is('dashboard/profile'))? 'active':''}}">
              <i class="nav-icon far fa-user"></i> <p> My Account</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link {{(request()->is('dashboard/user'))?'active':''}}">
              <i class="nav-icon fas fa-users"></i><p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link {{(request()->is('dashboard/category'))?'active':''}}">
              <i class="nav-icon fas fa-tag"></i><p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tag.index')}}" class="nav-link {{(request()->is('dashboard/tag'))?'active':''}}">
              <i class="nav-icon fas fa-tags"></i><p>Tag</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link {{(request()->is('dashboard/post'))? 'active':''}}">
              <i class="nav-icon fas fa-pen-fancy"></i><p>Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('manage.index')}}" class="nav-link {{(request()->is('dashboard/manage'))? 'active':''}}">
              <i class="nav-icon fas fa-cogs"></i><p>Manage Website</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('contactus.index')}}" class="nav-link {{(request()->is('dashboard/contactus'))? 'active':''}}">
              <i class="nav-icon far fa-comment-alt"></i> <p> Message</p>
            </a>
          </li>
          
          <li class="nav-item mb-1">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
              <a href="{{route('logout')}}"onclick="event.preventDefault();this.closest('form').submit();" class="nav-link logout">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </form>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{url('/')}}" class="nav-link  bg-warning text-dark" target="_blank">
                <i class="nav-icon fas fa-eye"></i> <p>View WebSite</p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3">
    
    @yield('content')
  </div>
 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">AB Farhan</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('contents/admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('contents/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- <!-- ChartJS -->
<!-- <script src="{{asset('contents/admin')}}/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="{{asset('contents/admin')}}/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="{{asset('contents/admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="{{asset('contents/admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{asset('contents/admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script> --> --}}

<!-- daterangepicker -->
<script src="{{asset('contents/admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
{{-- <!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{asset('contents/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
 --}}
@yield('script')
<!-- overlayScrollbars -->

<!-- AdminLTE App -->
<script src="{{asset('contents/admin')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('contents/admin')}}/dist/js/pages/dashboard.js"></script>

<!-- //validation -->
<script src="{{asset('contents/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('contents/admin')}}/dist/js/bs-custom-file-input.min.js"></script>
<script src="{{asset('contents/admin')}}/dist/js/demo.js"></script>
<script src="{{asset('contents/admin')}}/dist/js/custom.js"></script>
<script>


</script>



</body>
</html>

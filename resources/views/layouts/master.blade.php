<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
  <title>@include('inc.companyname')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> 
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/klinik/public/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/klinik/public/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- jQuery -->
  <script  src="/klinik/public/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/klinik/public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="/klinik/public/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="/klinik/public/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="/klinik/public/adminlte/plugins/inputmask/jquery.inputmask.bundle.js"></script>
  <script src="/klinik/public/adminlte/plugins/moment/moment.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="/klinik/public/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="/klinik/public/adminlte/js/demo.js"></script>
  <!-- SweetAlert2 -->
  <script src="/klinik/public/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/klinik/public/adminlte/js/adminlte.min.js"></script>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>



</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          {{ csrf_field() }}
          <button type="submit" class="btn btn-default">Logout</button>
      </form>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('inc.sidebarmenu')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  
  @include('inc.footer')
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script  src="{{ asset('js/myscript.js') }}"></script>

@include('inc.alert')  
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield("meta_title") | {{ env('APP_NAME') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('storage/admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('storage/admin/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{asset('storage/admin/plugins/sweetalert2/sweetalert2.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


  @include("admin.includes.navbar")

  @include("admin.includes.sidebar")
  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">@yield('meta_title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">@yield('meta_title')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  @yield("content")
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://rohido.com/">Rohido Media</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script type="text/javascript" src="{{ asset('storage/admin/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/dist/js/adminlte.js')}}"></script>

<script type="text/javascript" src="{{ asset('storage/admin/dist/js/bootstrap-tagsinput.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/raphael/raphael.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/chart.js/Chart.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/flot-old/jquery.flot.resize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/flot-old/jquery.flot.pie.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('storage/admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
  $(function () {
  bsCustomFileInput.init();
});
</script>
@yield('script')

</body>
</html>

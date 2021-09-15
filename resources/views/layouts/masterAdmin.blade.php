
<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>DFB Valuation Tool</title>

   <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
    <!-- Google Font: Source Sans Pro -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">





  <!-- <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>






    @yield('page-custom-css')
  </head>
  <body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">

      <!-- Navbar -->
      @include('includes.cms_navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('includes.cms_aside')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">@yield('page-title')</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  @yield('breadcrumb')
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            @yield('content')
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      {{-- @include('includes.cms_footer') --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @auth
    <script>
      window.user = @json(auth()->user())
    </script>
    @endauth


    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    {{-- <script src="dist/js/adminlte.js"></script> --}}

    <!-- OPTIONAL SCRIPTS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    {{-- <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script> --}}


    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <script src="/plugins/datatables/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
<!-- <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script> -->

    <script src="/js/app.js"></script>

    <script>
        @if(Session::has('success'))
        swal("{{Session::get('success')}}");
        @endif

        @if(Session::has('custom_error'))
        swal('Error',"{{Session::get('custom_error')}}");
        @endif

        @if ($errors->any())
        swal('Error',
        '@foreach ($errors->all() as $error){{ $error }} \n @endforeach',
        'error',)
        @endif
    </script>


    @yield('page-custom-js')
  </body>
  </html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('adminLTE/bower_components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link href="{{ asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Ionicons -->
    <link href="{{ asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminLTE/bower_components/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("adminLTE/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("adminLTE/dist/css/skins/skin-robi.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    @stack('styles')
</head>
<body class="hold-transition skin-robi sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('partials.dashboard.header')

    <!-- Sidebar -->
    @include('partials.dashboard.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('partials.dashboard.footer')

    <!-- Control sidebar -->
    @include('partials.dashboard.control-panel')
</div><!-- ./wrapper -->


<script src="{{asset("adminLTE/bower_components/jquery/dist/jquery.min.js") }}"></script>
<script src="{{asset("adminLTE/bower_components/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{asset("adminLTE/bower_components/select2/js/select2.min.js") }}"></script>
<script src="{{asset("adminLTE/dist/js/adminlte.min.js") }}"></script>
<script src="{{asset('adminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset("adminLTE/bower_components/moment/moment.js") }}"></script>
<script src="{{asset("adminLTE/bower_components/chart/Chart.min.js") }}"></script>
<script src="{{asset("adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset('adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@stack('scripts')
</body>
</html>

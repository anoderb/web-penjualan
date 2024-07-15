<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Page') }} {{ $title ? ' - ' . $title : '' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/dist/css/adminlte.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte3-template/plugins/summernote/summernote-bs4.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/my-style.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.home.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.home.sidebar')

            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->

            @include('layouts.home.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('/') }}adminlte3-template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}adminlte3-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}adminlte3-template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}adminlte3-template/dist/js/adminlte.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('/') }}adminlte3-template/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/') }}adminlte3-template/dist/js/demo.js"></script>

    <script src="{{ asset('/') }}assets/js/my-script.js"></script>

    <script>
        $(function() {
            $('#summernote').summernote()

            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    @yield('script')

</body>
<!-- END: Body-->

</html>

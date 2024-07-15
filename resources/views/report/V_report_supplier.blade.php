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

    <style>
        @media print {
            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <!-- Site wrapper -->
        <div class="wrapper">
            <div class="content-wrappe">
                <div class="container-fluid p-4">
                    <div class="d-flex justify-content-center align-items-center gap-5">
                        <img src="{{ asset('assets/images/shj.png') }}" alt="" width="110">
                        <div class="text-center">
                            <h3>{{ strtoupper($title) }}</h3>
                            <h3>CV SATRIA HENDRA JAYA</h3>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th>Nama Pemasok</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td class="align-top">{{ $i++ }}</td>
                                        <td class="text-nowrap align-top">
                                            {{ $supplier->supplier_name }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $supplier->address }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $supplier->no_telp }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <div class="text-center">
                                    <h6 class="text-nowrap">Pekanbaru, {{ date('d F Y') }}</h6>
                                    <h6 class="mt-5">{{ Auth::user()->name }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
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

    @yield('script')

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
<!-- END: Body-->

</html>

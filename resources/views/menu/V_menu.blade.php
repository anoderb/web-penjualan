@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                {{-- firstmenu --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Menu Pertama</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#firstmenu_createModal"><i class="fas fa-plus"></i>&nbsp; Tambah Menu Pertama</button>
                                    </div>
                                </div>
                                @include('menu.V_menu_create')
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu Pertama Nama</th>
                                                    <th>Menu Pertama Link</th>
                                                    <th>Menu Pertama Icon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($firstmenus as $firstmenu)
                                                    <tr>
                                                        <td class="align-top">{{ $i++ }}</td>
                                                        <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_link }}</td>
                                                        <td class="text-nowrap align-top">{{ $firstmenu->firstmenu_icon }}</td>
                                                        <td class="align-top btn-group">
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#firstmenu_editModal{{ $firstmenu->id_firstmenu }}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#firstmenu_deletetModal{{ $firstmenu->id_firstmenu }}"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                        @include('menu.V_menu_edit')
                                                        @include('menu.V_menu_delete')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- secondmenu --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Menu Kedua</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-primary btn_secondmenu" data-toggle="modal" data-target="#secondmenu_createModal"><i class="fas fa-plus"></i>&nbsp; Tambah Menu Kedua</button>
                                    </div>
                                </div>
                                @include('menu.V_menu_create')
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu Pertama Nama</th>
                                                    <th>Menu Kedua Nama</th>
                                                    <th>Menu Kedua Link</th>
                                                    <th>Menu Kedua Icon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($secondmenus as $secondmenu)
                                                    <tr>
                                                        <td class="align-top">{{ $i++ }}</td>
                                                        <td class="text-nowrap align-top">{{ $secondmenu->firstmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_link }}</td>
                                                        <td class="text-nowrap align-top">{{ $secondmenu->secondmenu_icon }}</td>
                                                        <td class="align-top btn-group">
                                                            <button type="button" class="btn btn-warning btn_secondmenu" data-id="{{ $secondmenu->id_firstmenu }}" data-toggle="modal" data-target="#secondmenu_editModal{{ $secondmenu->id_secondmenu }}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#secondmenu_deletetModal{{ $secondmenu->id_secondmenu }}"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                        @include('menu.V_menu_edit')
                                                        @include('menu.V_menu_delete')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- thirdmenu --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Menu Ketiga</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-primary btn_thirdmenu" data-toggle="modal" data-target="#thirdmenu_createModal"><i class="fas fa-plus"></i>&nbsp; Tambah Menu Ketiga</button>
                                    </div>
                                </div>
                                @include('menu.V_menu_create')
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu Kedua Nama</th>
                                                    <th>Menu Ketiga Nama</th>
                                                    <th>Menu Ketiga Link</th>
                                                    <th>Menu Ketiga Icon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($thirdmenus as $thirdmenu)
                                                    <tr>
                                                        <td class="align-top">{{ $i++ }}</td>
                                                        <td class="text-nowrap align-top">{{ $thirdmenu->secondmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_link }}</td>
                                                        <td class="text-nowrap align-top">{{ $thirdmenu->thirdmenu_icon }}</td>
                                                        <td class="align-top btn-group">
                                                            <button type="button" class="btn btn-warning btn_thirdmenu" data-id="{{ $thirdmenu->id_secondmenu }}" data-toggle="modal" data-target="#thirdmenu_editModal{{ $thirdmenu->id_thirdmenu }}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#thirdmenu_deletetModal{{ $thirdmenu->id_thirdmenu }}"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                        @include('menu.V_menu_edit')
                                                        @include('menu.V_menu_delete')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- thirdmenu --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Menu Keempat</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-primary btn_fourthmenu" data-toggle="modal" data-target="#fourthmenu_createModal"><i class="fas fa-plus"></i>&nbsp; Tambah Menu Keempat</button>
                                    </div>
                                </div>
                                @include('menu.V_menu_create')
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu Ketiga Nama</th>
                                                    <th>Menu Keempat Nama</th>
                                                    <th>Menu Keempat Link</th>
                                                    <th>Menu Keempat Icon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($fourthmenus as $fourthmenu)
                                                    <tr>
                                                        <td class="align-top">{{ $i++ }}</td>
                                                        <td class="text-nowrap align-top">{{ $fourthmenu->thirdmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_name }}</td>
                                                        <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_link }}</td>
                                                        <td class="text-nowrap align-top">{{ $fourthmenu->fourthmenu_icon }}</td>
                                                        <td class="align-top btn-group">
                                                            <button type="button" class="btn btn-warning btn_fourthmenu" data-id="{{ $fourthmenu->id_thirdmenu }}" data-toggle="modal" data-target="#fourthmenu_editModal{{ $fourthmenu->id_fourthmenu }}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fourthmenu_deletetModal{{ $fourthmenu->id_fourthmenu }}"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                        @include('menu.V_menu_edit')
                                                        @include('menu.V_menu_delete')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('style')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.btn_secondmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_firstmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_firstmenu').empty();
                        $('.id_firstmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_firstmenu == buttonId) ? 'selected' : '';
                            $('.id_firstmenu').append('<option value="' + item.id_firstmenu + '" ' + selected + '>' + item.firstmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.btn_thirdmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_secondmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_secondmenu').empty();
                        $('.id_secondmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_secondmenu == buttonId) ? 'selected' : '';
                            $('.id_secondmenu').append('<option value="' + item.id_secondmenu + '" ' + selected + '>' + item.secondmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.btn_fourthmenu').on('click', function() {
                var buttonId = $(this).data('id');
                $.ajax({
                    url: "{{ route('menu_thirdmenu_list') }}",
                    method: "GET",
                    success: function(response) {
                        $('.id_thirdmenu').empty();
                        $('.id_thirdmenu').append('<option value="">- select -</option>');
                        $.each(response, function(index, item) {
                            var selected = (item.id_thirdmenu == buttonId) ? 'selected' : '';
                            $('.id_thirdmenu').append('<option value="' + item.id_thirdmenu + '" ' + selected + '>' + item.thirdmenu_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection

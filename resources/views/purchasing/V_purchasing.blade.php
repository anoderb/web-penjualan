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
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i>&nbsp; Tambah Data</button>
                        @include('purchasing.V_purchasing_create')
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert  alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{ session('success') ? session('success') : session('error') }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                </button>
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Nama Pemasok</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($purchasings as $purchasing)
                                    <tr>
                                        <td class="align-top">{{ $i++ }}</td>
                                        <td class="text-nowrap align-top">
                                            {{ $purchasing->no_invoice }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $purchasing->supplier->supplier_name }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            Rp. {{ number_format($purchasing->total) }}
                                        </td>
                                        <td class="align-top btn-group">
                                            <a href="{{ route('purchasing_edit', $purchasing->id_purchasing) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletetModal{{ $purchasing->id_purchasing }}"><i class="fas fa-trash"></i></button>
                                        </td>
                                        @include('purchasing.V_purchasing_delete')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection

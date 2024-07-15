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
                        <a href="{{ route('product_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Tambah Data</a>
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
                                    <th>Foto Produk</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>QTY</th>
                                    <th>Satuan</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="align-top">{{ $i++ }}</td>
                                        <td class="text-nowrap align-top">
                                            <a href="{{ asset('/assets/images/product/' . $product->product_photo) }}" target="_blank">
                                                <img src="{{ asset('/assets/images/product/' . $product->product_photo) }}" alt="" class="img-thumbnail">
                                            </a>
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $product->product_code }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $product->product_name }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $product->category->category_name }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $product->qty }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            {{ $product->unit }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            Rp. {{ number_format($product->price_sale) }}
                                        </td>
                                        <td class="text-nowrap align-top">
                                            Rp. {{ number_format($product->discount) }}
                                        </td>
                                        <td class="align-top btn-group">
                                            <a href="{{ route('product_edit', $product->id_product) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletetModal{{ $product->id_product }}"><i class="fas fa-trash"></i></button>
                                        </td>
                                        @include('product.V_product_delete')
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
    <style>
        .img-thumbnail {
            width: 60px;
            height: 60px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
@endsection

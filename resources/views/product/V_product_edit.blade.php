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
                            <li class="breadcrumb-item"><a href="{{ url('/product') }}">
                                    Produk</a></li>
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
                    <form action="{{ route('product_update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if (session('success') || session('error'))
                                <div class="alert  alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                                    <p class="mb-0">{{ session('success') ? session('success') : session('error') }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_code">Kode Produk</label>
                                        <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}" class="form-control product_code @error('product_code') is-invalid @enderror" placeholder="Kode Produk" readonly>
                                        @error('product_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Nama Produk</label>
                                        <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="form-control product_name @error('product_name') is-invalid @enderror" placeholder="Nama Produk">
                                        @error('product_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="id_category">Kategori</label>
                                        <select name="id_category" id="id_category" class="form-control id_category @error('id_category') is-invalid @enderror">
                                            <option value="">- pilih -</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_category }}" {{ $category->id_category == $product->id_category ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Stok</label>
                                        <input type="number" name="qty" id="qty" value="{{ $product->qty }}" class="form-control qty @error('qty') is-invalid @enderror" placeholder="Stok">
                                        @error('qty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit">Satuan</label>
                                        <input type="text" name="unit" id="unit" value="{{ $product->unit }}" class="form-control unit @error('unit') is-invalid @enderror" placeholder="Satuan">
                                        @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price_sale">Harga Jual</label>
                                        <input type="number" name="price_sale" id="price_sale" value="{{ $product->price_sale }}" class="form-control price_sale @error('price_sale') is-invalid @enderror" placeholder="Harga Jual">
                                        @error('price_sale')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Diskon</label>
                                        <input type="number" name="discount" id="discount" value="{{ $product->discount }}" class="form-control discount @error('discount') is-invalid @enderror" placeholder="Diskon">
                                        @error('discount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <textarea name="description" id="summernote" class="form-control description @error('description') is-invalid @enderror" cols="30" rows="10">{{ $product->description }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_photo">Foto Produk</label>
                                        @if ($product->product_photo)
                                            <a href="{{ asset('/assets/images/product/' . $product->product_photo) }}" target="_blank">
                                                <img src="{{ asset('/assets/images/product/' . $product->product_photo) }}" alt="" class="img-thumbnail preview_product_photo">
                                            </a>
                                        @else
                                            <img src="{{ asset('/assets/images/application/default-image.jpg') }}" alt="" class="img-thumbnail preview_product_photo">
                                        @endif
                                        <input type="file" name="product_photo" id="product_photo" value="" class="form-control product_photo @error('product_photo') is-invalid @enderror" accept="image/*">
                                        @error('product_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
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
            width: 100%;
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Function to display image preview
            function readURL(input, target) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(target).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            // Trigger the preview when an image input changes
            $('.product_photo').change(function() {
                readURL(this, '.preview_product_photo');
            });
        });
    </script>
@endsection

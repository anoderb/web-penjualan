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
                            <li class="breadcrumb-item"><a href="{{ url('/sales') }}">
                                    Penjualan</a></li>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_invoice">No Faktur</label>
                                    <input type="text" name="no_invoice" id="no_invoice" value="{{ $sales->no_invoice }}" class="form-control no_invoice" placeholder="No Faktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="sales_type">Jenis Penjualan</label>
                                    <input type="text" name="sales_type" id="sales_type" value="{{ $sales->sales_type }}" class="form-control sales_type" placeholder="Jenis Penjualan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_customer">Nama Konsumen</label>
                                    <input type="text" name="id_customer" id="id_customer" value="{{ $sales->customer->customer_name }}" class="form-control id_customer" placeholder="Nama Konsumen" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <h1>Rp. {{ number_format($sales->total) }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        @if (session('success') || session('error'))
                            <div class="alert  alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{ session('success') ? session('success') : session('error') }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('store_sales_detail', $sales->id_sales) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_code">Kode Produk</label>
                                        <input type="text" name="product_code" id="product_code" value="{{ old('product_code') }}" class="form-control product_code @error('product_code') is-invalid @enderror">
                                        @error('product_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qty_sale">QTY</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="qty_sale" id="qty_sale" value="{{ old('qty_sale') }}" class="form-control qty_sale @error('qty_sale') is-invalid @enderror">
                                                @error('qty_sale')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <br>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>QTY</th>
                                        <th>Diskon</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($sales_details as $sales_detail)
                                        <tr>
                                            <td class="align-top">{{ $i++ }}</td>
                                            <td class="text-nowrap align-top">
                                                {{ $sales_detail->product->product_code . ' - ' . $sales_detail->product->product_name }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                {{ $sales_detail->product->unit }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                Rp. {{ number_format($sales_detail->price_sale) }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                {{ $sales_detail->qty_sale }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                Rp. {{ number_format($sales_detail->discount_sale) }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                Rp. {{ number_format($sales_detail->subtotal_sale) }}
                                            </td>
                                            <td class="align-top btn-group">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletesalesdetailtModal{{ $sales_detail->id_sales_detail }}"><i class="fas fa-trash"></i></button>

                                                <div class="modal fade text-left" id="deletesalesdetailtModal{{ $sales_detail->id_sales_detail }}" tabindex="-1" role="dialog" aria-labelledby="deletesalesdetailtModalLabel{{ $sales_detail->id_sales_detail }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="deletesalesdetailtModalLabel{{ $sales_detail->id_sales_detail }}">Hapus Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Apakah Anda yakin ingin menghapus data ini?</h5>
                                                                <p>Jika iya, pilih 'Hapus' untuk menghapus data.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('destroy_sales_detail', ['id' => $sales_detail->id_sales_detail, 'id_sales' => $sales->id_sales]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkoutModal">Pembayaran</button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="checkoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update_sales_payment', $sales->id_sales) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" name="total" id="total" value="{{ $sales->total }}" class="form-control total" readonly>
                            @error('total')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="payment">Bayar</label>
                            <input type="text" name="payment" id="payment" value="{{ $sales->payment }}" class="form-control payment @error('payment') is-invalid @enderror" placeholder="Bayar">
                            @error('payment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="change_money">Kembalian</label>
                            <input type="text" name="change_money" id="change_money" value="{{ $sales->change_money }}" class="form-control change_money @error('change_money') is-invalid @enderror" placeholder="Kembalian" readonly>
                            @error('change_money')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('style')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function calculateSubtotal() {
                var total = parseFloat($('#total').val()) || 0;
                var payment = parseFloat($('#payment').val()) || 0;
                var change_money = payment - total;
                $('#change_money').val(change_money);
            }

            // Event listener untuk perubahan pada input harga beli dan kuantitas beli
            $('#total, #payment').on('input', function() {
                calculateSubtotal();
            });
        });
    </script>
@endsection

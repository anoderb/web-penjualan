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
                            <li class="breadcrumb-item"><a href="{{ url('/purchasing') }}">
                                    Pembelian</a></li>
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
                                    <input type="text" name="no_invoice" id="no_invoice" value="{{ $purchasing->no_invoice }}" class="form-control no_invoice" placeholder="No Faktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_supplier">Nama Pemasok</label>
                                    <input type="text" name="id_supplier" id="id_supplier" value="{{ $purchasing->supplier->supplier_name }}" class="form-control id_supplier @error('id_supplier') is-invalid @enderror" placeholder="Nama Pemasok" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <h1>Rp. {{ number_format($purchasing->total) }}</h1>
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

                        <form action="{{ route('store_purchasing_detail', $purchasing->id_purchasing) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_product">Kode Produk</label>
                                        <select name="id_product" id="id_product" class="form-control select2 id_product @error('id_product') is-invalid @enderror">
                                            <option value="">- pilih -</option>
                                            @foreach ($products as $product)
                                                <?php $value = implode(',', [$product->id_product, $product->qty, $product->unit]); ?>
                                                <option value="{{ $product->id_product . ',' . $product->qty . ',' . $product->unit }}" {{ $product->id_product . ',' . $product->qty . ',' . $product->unit == old('id_product') ? 'selected' : '' }}>
                                                    {{ $product->product_code . ' - ' . $product->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_product')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Stok Lama</label>
                                        <input type="number" name="qty" id="qty" value="{{ old('qty') }}" class="form-control qty @error('qty') is-invalid @enderror" readonly>
                                        @error('qty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="unit">Satuan</label>
                                        <input type="text" name="unit" id="unit" value="{{ old('unit') }}" class="form-control unit @error('unit') is-invalid @enderror" readonly>
                                        @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_purchase">Harga Beli</label>
                                        <input type="number" name="price_purchase" id="price_purchase" value="{{ old('price_purchase') }}" class="form-control price_purchase @error('price_purchase') is-invalid @enderror">
                                        @error('price_purchase')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="qty_purchase">QTY Beli</label>
                                        <input type="number" name="qty_purchase" id="qty_purchase" value="{{ old('qty_purchase') }}" class="form-control qty_purchase @error('qty_purchase') is-invalid @enderror">
                                        @error('qty_purchase')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subtotal_purchase">Sub Total</label>
                                        <input type="number" name="subtotal_purchase" id="subtotal_purchase" value="{{ old('subtotal_purchase') }}" class="form-control subtotal_purchase @error('subtotal_purchase') is-invalid @enderror" readonly>
                                        @error('subtotal_purchase')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
                        </form>

                        <br>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga Beli</th>
                                        <th>QTY Beli</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($purchasing_details as $purchasing_detail)
                                        <tr>
                                            <td class="align-top">{{ $i++ }}</td>
                                            <td class="text-nowrap align-top">
                                                {{ $purchasing_detail->product->product_code . ' - ' . $purchasing_detail->product->product_name }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                {{ $purchasing_detail->product->unit }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                {{ $purchasing_detail->price_purchase }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                {{ $purchasing_detail->qty_purchase }}
                                            </td>
                                            <td class="text-nowrap align-top">
                                                Rp. {{ number_format($purchasing_detail->subtotal_purchase) }}
                                            </td>
                                            <td class="align-top btn-group">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletepurchasingdetailtModal{{ $purchasing_detail->id_purchasing_detail }}"><i class="fas fa-trash"></i></button>

                                                <div class="modal fade text-left" id="deletepurchasingdetailtModal{{ $purchasing_detail->id_purchasing_detail }}" tabindex="-1" role="dialog" aria-labelledby="deletepurchasingdetailtModalLabel{{ $purchasing_detail->id_purchasing_detail }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="deletepurchasingdetailtModalLabel{{ $purchasing_detail->id_purchasing_detail }}">Hapus Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Apakah Anda yakin ingin menghapus data ini?</h5>
                                                                <p>Jika iya, pilih 'Hapus' untuk menghapus data.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('destroy_purchasing_detail', ['id' => $purchasing_detail->id_purchasing_detail, 'id_purchasing' => $purchasing->id_purchasing]) }}" method="POST">
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
    <script>
        $(document).ready(function() {
            $('#id_product').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    var values = selectedValue.split(',');
                    $('#qty').val(values[1]);
                    $('#unit').val(values[2]);
                } else {
                    $('#qty').val('');
                    $('#unit').val('');
                }
            });

            // Fungsi untuk menghitung subtotal
            function calculateSubtotal() {
                var pricePurchase = parseFloat($('#price_purchase').val()) || 0;
                var qtyPurchase = parseFloat($('#qty_purchase').val()) || 0;
                var subtotal = pricePurchase * qtyPurchase;
                $('#subtotal_purchase').val(subtotal);
            }

            // Event listener untuk perubahan pada input harga beli dan kuantitas beli
            $('#price_purchase, #qty_purchase').on('input', function() {
                calculateSubtotal();
            });
        });
    </script>
@endsection

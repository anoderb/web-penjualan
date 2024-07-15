<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sales_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_customer">Konsumen</label>
                        <select name="id_customer" id="id_customer" class="form-control id_customer @error('id_customer') is-invalid @enderror">
                            <option value="">- pilih -</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id_customer }}" {{ $customer->id_customer == old('id_customer') ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                        @error('id_customer')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sales_type">Jenis Penjualan</label>
                        <select name="sales_type" id="sales_type" class="form-control sales_type @error('sales_type') is-invalid @enderror">
                            <option value="">- pilih -</option>
                            <option value="Pemesanan" {{ old('sales_type') == 'Pemesanan' ? 'selected' : '' }}>Pemesanan</option>
                            <option value="Penjualan" {{ old('sales_type') == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
                        </select>
                        @error('sales_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

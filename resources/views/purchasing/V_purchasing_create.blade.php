<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('purchasing_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_invoice">No Faktur</label>
                        <input type="text" name="no_invoice" id="no_invoice" value="{{ old('no_invoice') }}" class="form-control no_invoice @error('no_invoice') is-invalid @enderror" placeholder="No Faktur" autofocus>
                        @error('no_invoice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_supplier">Nama Pemasok</label>
                        <select name="id_supplier" id="id_supplier" class="form-control id_supplier @error('id_supplier') is-invalid @enderror">
                            <option value="">- pilih -</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id_supplier }}" {{ $supplier->id_supplier == old('id_supplier') ? 'selected' : '' }}>{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                        @error('id_supplier')
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

<div class="modal fade" id="editModal{{ $supplier->id_supplier }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supplier_update', $supplier->id_supplier) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="supplier_name">Nama Pemasok</label>
                        <input type="text" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control supplier_name @error('supplier_name') is-invalid @enderror" placeholder="Nama Pemasok" autofocus>
                        @error('supplier_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" id="address" value="{{ $supplier->address }}" class="form-control address @error('address') is-invalid @enderror" placeholder="Alamat">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" name="no_telp" id="no_telp" value="{{ $supplier->no_telp }}" class="form-control no_telp @error('no_telp') is-invalid @enderror" placeholder="No Telepon">
                        @error('no_telp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

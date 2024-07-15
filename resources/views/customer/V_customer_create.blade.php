<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('customer_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp') }}" class="form-control no_ktp @error('no_ktp') is-invalid @enderror" placeholder="No KTP" autofocus>
                        @error('no_ktp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Nama Konsumen</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" class="form-control customer_name @error('customer_name') is-invalid @enderror" placeholder="Nama Konsumen">
                        @error('customer_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" class="form-control address @error('address') is-invalid @enderror" placeholder="Alamat" cols="30" rows="5">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" class="form-control no_telp @error('no_telp') is-invalid @enderror" placeholder="No Telepon">
                        @error('no_telp')
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

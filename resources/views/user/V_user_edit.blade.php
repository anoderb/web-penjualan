<div class="modal fade" id="editModal{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user_update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control name @error('name') is-invalid @enderror" placeholder="Nama" autofocus>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control email @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" value="" class="form-control password @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ $user->no_hp }}" class="form-control no_hp @error('no_hp') is-invalid @enderror" placeholder="No HP">
                        @error('no_hp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_level">Hak Akses</label>
                        <select name="id_level" id="id_level" class="form-control id_level @error('id_level') is-invalid @enderror">
                            <option value="">- pilih -</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id_level }}" {{ $level->id_level == $user->id_level ? 'selected' : '' }}>{{ $level->level_name }}</option>
                            @endforeach
                        </select>
                        @error('id_level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control status @error('status') is-invalid @enderror">
                            <option value="">- pilih -</option>
                            <option value="Aktif" {{ 'Aktif' == $user->status ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ 'Tidak Aktif' == $user->status ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
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

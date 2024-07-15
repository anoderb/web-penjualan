{{-- firstmenu --}}
<div class="modal fade text-left" id="firstmenu_createModal" tabindex="-1" role="dialog" aria-labelledby="firstmenu_createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="firstmenu_createModalLabel">Tambah Menu Pertama</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menu_firstmenu_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstmenu_name">Menu Pertama Nama</label>
                        <input type="text" name="firstmenu_name" id="firstmenu_name" value="{{ old('firstmenu_name') }}" class="form-control firstmenu_name @error('firstmenu_name') is-invalid @enderror" placeholder="Firstmenu Nama" autofocus>
                        @error('firstmenu_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="firstmenu_link">Menu Pertama Link</label>
                        <input type="text" name="firstmenu_link" id="firstmenu_link" value="{{ old('firstmenu_link') }}" class="form-control firstmenu_link @error('firstmenu_link') is-invalid @enderror" placeholder="Firstmenu Link">
                        @error('firstmenu_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="firstmenu_icon">Menu Pertama Icon</label>
                        <input type="text" name="firstmenu_icon" id="firstmenu_icon" value="{{ old('firstmenu_icon') }}" class="form-control firstmenu_icon @error('firstmenu_icon') is-invalid @enderror" placeholder="Firstmenu Icon">
                        @error('firstmenu_icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- secondmenu --}}
<div class="modal fade text-left" id="secondmenu_createModal" tabindex="-1" role="dialog" aria-labelledby="secondmenu_createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="secondmenu_createModalLabel">Tambah Menu Kedua</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menu_secondmenu_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_firstmenu">Menu Pertama Nama</label>
                        <select name="id_firstmenu" id="id_firstmenu" class="form-control id_firstmenu @error('id_firstmenu') is-invalid @enderror" autofocus>
                        </select>
                        @error('id_firstmenu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="secondmenu_name">Menu Kedua Nama</label>
                        <input type="text" name="secondmenu_name" id="secondmenu_name" value="{{ old('secondmenu_name') }}" class="form-control secondmenu_name @error('secondmenu_name') is-invalid @enderror" placeholder="Secondmenu Nama">
                        @error('secondmenu_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="secondmenu_link">Menu Kedua Link</label>
                        <input type="text" name="secondmenu_link" id="secondmenu_link" value="{{ old('secondmenu_link') }}" class="form-control secondmenu_link @error('secondmenu_link') is-invalid @enderror" placeholder="Secondmenu Link">
                        @error('secondmenu_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="secondmenu_icon">Menu Kedua Icon</label>
                        <input type="text" name="secondmenu_icon" id="secondmenu_icon" value="{{ old('secondmenu_icon') }}" class="form-control secondmenu_icon @error('secondmenu_icon') is-invalid @enderror" placeholder="Secondmenu Icon">
                        @error('secondmenu_icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- thirdmenu --}}
<div class="modal fade text-left" id="thirdmenu_createModal" tabindex="-1" role="dialog" aria-labelledby="thirdmenu_createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="thirdmenu_createModalLabel">Tambah Menu Ketiga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menu_thirdmenu_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_secondmenu">Menu Kedua Nama</label>
                        <select name="id_secondmenu" id="id_secondmenu" class="form-control id_secondmenu @error('id_secondmenu') is-invalid @enderror" autofocus>
                        </select>
                        @error('id_secondmenu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thirdmenu_name">Menu Ketiga Nama</label>
                        <input type="text" name="thirdmenu_name" id="thirdmenu_name" value="{{ old('thirdmenu_name') }}" class="form-control thirdmenu_name @error('thirdmenu_name') is-invalid @enderror" placeholder="Thirdmenu Nama">
                        @error('thirdmenu_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thirdmenu_link">Menu Ketiga Link</label>
                        <input type="text" name="thirdmenu_link" id="thirdmenu_link" value="{{ old('thirdmenu_link') }}" class="form-control thirdmenu_link @error('thirdmenu_link') is-invalid @enderror" placeholder="Thirdmenu Link">
                        @error('thirdmenu_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thirdmenu_icon">Menu Ketiga Icon</label>
                        <input type="text" name="thirdmenu_icon" id="thirdmenu_icon" value="{{ old('thirdmenu_icon') }}" class="form-control thirdmenu_icon @error('thirdmenu_icon') is-invalid @enderror" placeholder="Thirdmenu Icon">
                        @error('thirdmenu_icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- fourthmenu --}}
<div class="modal fade text-left" id="fourthmenu_createModal" tabindex="-1" role="dialog" aria-labelledby="fourthmenu_createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fourthmenu_createModalLabel">Tambah Menu Keempat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menu_fourthmenu_store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_thirdmenu">Menu Ketiga Nama</label>
                        <select name="id_thirdmenu" id="id_thirdmenu" class="form-control id_thirdmenu @error('id_thirdmenu') is-invalid @enderror" autofocus>
                        </select>
                        @error('id_thirdmenu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fourthmenu_name">Menu Keempat Nama</label>
                        <input type="text" name="fourthmenu_name" id="fourthmenu_name" value="{{ old('fourthmenu_name') }}" class="form-control fourthmenu_name @error('fourthmenu_name') is-invalid @enderror" placeholder="Fourthmenu Nama">
                        @error('fourthmenu_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fourthmenu_link">Menu Keempat Link</label>
                        <input type="text" name="fourthmenu_link" id="fourthmenu_link" value="{{ old('fourthmenu_link') }}" class="form-control fourthmenu_link @error('fourthmenu_link') is-invalid @enderror" placeholder="Fourthmenu Link">
                        @error('fourthmenu_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fourthmenu_icon">Menu Keempat Icon</label>
                        <input type="text" name="fourthmenu_icon" id="fourthmenu_icon" value="{{ old('fourthmenu_icon') }}" class="form-control fourthmenu_icon @error('fourthmenu_icon') is-invalid @enderror" placeholder="Fourthmenu Icon">
                        @error('fourthmenu_icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (isset($firstmenu))
    <div class="modal fade text-left" id="firstmenu_editModal{{ $firstmenu->id_firstmenu }}" tabindex="-1" role="dialog" aria-labelledby="firstmenu_editModalLabel{{ $firstmenu->id_firstmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="firstmenu_editModalLabel{{ $firstmenu->id_firstmenu }}">Ubah Menu Pertama</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('menu_firstmenu_update', $firstmenu->id_firstmenu) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstmenu_name">Menu Pertama Nama</label>
                            <input type="text" name="firstmenu_name" id="firstmenu_name" value="{{ $firstmenu->firstmenu_name }}" class="form-control firstmenu_name @error('firstmenu_name') is-invalid @enderror" placeholder="Firstmenu Nama" autofocus>
                            @error('firstmenu_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="firstmenu_link">Menu Pertama Link</label>
                            <input type="text" name="firstmenu_link" id="firstmenu_link" value="{{ $firstmenu->firstmenu_link }}" class="form-control firstmenu_link @error('firstmenu_link') is-invalid @enderror" placeholder="Firstmenu Link">
                            @error('firstmenu_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="firstmenu_icon">Menu Pertama Icon</label>
                            <input type="text" name="firstmenu_icon" id="firstmenu_icon" value="{{ $firstmenu->firstmenu_icon }}" class="form-control firstmenu_icon @error('firstmenu_icon') is-invalid @enderror" placeholder="Firstmenu Icon">
                            @error('firstmenu_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if (isset($secondmenu))
    <div class="modal fade text-left" id="secondmenu_editModal{{ $secondmenu->id_secondmenu }}" tabindex="-1" role="dialog" aria-labelledby="secondmenu_editModalLabel{{ $secondmenu->id_secondmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="secondmenu_editModalLabel{{ $secondmenu->id_secondmenu }}">Ubah Menu Kedua</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('menu_secondmenu_update', $secondmenu->id_secondmenu) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <input type="text" name="secondmenu_name" id="secondmenu_name" value="{{ $secondmenu->secondmenu_name }}" class="form-control secondmenu_name @error('secondmenu_name') is-invalid @enderror" placeholder="Secondmenu Nama">
                            @error('secondmenu_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="secondmenu_link">Menu Kedua Link</label>
                            <input type="text" name="secondmenu_link" id="secondmenu_link" value="{{ $secondmenu->secondmenu_link }}" class="form-control secondmenu_link @error('secondmenu_link') is-invalid @enderror" placeholder="Secondmenu Link">
                            @error('secondmenu_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="secondmenu_icon">Menu Kedua Icon</label>
                            <input type="text" name="secondmenu_icon" id="secondmenu_icon" value="{{ $secondmenu->secondmenu_icon }}" class="form-control secondmenu_icon @error('secondmenu_icon') is-invalid @enderror" placeholder="Secondmenu Icon">
                            @error('secondmenu_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if (isset($thirdmenu))
    <div class="modal fade text-left" id="thirdmenu_editModal{{ $thirdmenu->id_thirdmenu }}" tabindex="-1" role="dialog" aria-labelledby="thirdmenu_editModalLabel{{ $thirdmenu->id_thirdmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="thirdmenu_editModalLabel{{ $thirdmenu->id_thirdmenu }}">Ubah Menu Ketiga</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('menu_thirdmenu_update', $thirdmenu->id_thirdmenu) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <input type="text" name="thirdmenu_name" id="thirdmenu_name" value="{{ $thirdmenu->thirdmenu_name }}" class="form-control thirdmenu_name @error('thirdmenu_name') is-invalid @enderror" placeholder="Thirdmenu Nama">
                            @error('thirdmenu_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thirdmenu_link">Menu Ketiga Link</label>
                            <input type="text" name="thirdmenu_link" id="thirdmenu_link" value="{{ $thirdmenu->thirdmenu_link }}" class="form-control thirdmenu_link @error('thirdmenu_link') is-invalid @enderror" placeholder="Thirdmenu Link">
                            @error('thirdmenu_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thirdmenu_icon">Menu Ketiga Icon</label>
                            <input type="text" name="thirdmenu_icon" id="thirdmenu_icon" value="{{ $thirdmenu->thirdmenu_icon }}" class="form-control thirdmenu_icon @error('thirdmenu_icon') is-invalid @enderror" placeholder="Thirdmenu Icon">
                            @error('thirdmenu_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if (isset($fourthmenu))
    <div class="modal fade text-left" id="fourthmenu_editModal{{ $fourthmenu->id_fourthmenu }}" tabindex="-1" role="dialog" aria-labelledby="fourthmenu_editModalLabel{{ $fourthmenu->id_fourthmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fourthmenu_editModalLabel{{ $fourthmenu->id_fourthmenu }}">Ubah Menu Keempat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('menu_fourthmenu_update', $fourthmenu->id_fourthmenu) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <input type="text" name="fourthmenu_name" id="fourthmenu_name" value="{{ $fourthmenu->fourthmenu_name }}" class="form-control fourthmenu_name @error('fourthmenu_name') is-invalid @enderror" placeholder="Fourthmenu Nama">
                            @error('fourthmenu_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fourthmenu_link">Menu Keempat Link</label>
                            <input type="text" name="fourthmenu_link" id="fourthmenu_link" value="{{ $fourthmenu->fourthmenu_link }}" class="form-control fourthmenu_link @error('fourthmenu_link') is-invalid @enderror" placeholder="Fourthmenu Link">
                            @error('fourthmenu_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fourthmenu_icon">Menu Keempat Icon</label>
                            <input type="text" name="fourthmenu_icon" id="fourthmenu_icon" value="{{ $fourthmenu->fourthmenu_icon }}" class="form-control fourthmenu_icon @error('fourthmenu_icon') is-invalid @enderror" placeholder="Fourthmenu Icon">
                            @error('fourthmenu_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

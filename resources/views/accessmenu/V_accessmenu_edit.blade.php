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
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">
                                    Dashboard</a></li>
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
                    <form action="{{ route('accessmenu_store', $level->id_level) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                            <h3>{{ !empty($level) ? 'Nama Level: ' . $level->level_name : '' }}</h3>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($menus as $menu)
                                            @php
                                                $checked = '';
                                                // Check apakah data menu ini sudah ada di tabel accessmenu
                                                $accessmenu = App\Models\M_accessmenu::where('id_firstmenu', $menu->id_firstmenu)
                                                    ->where('id_secondmenu', $menu->id_secondmenu)
                                                    ->where('id_thirdmenu', $menu->id_thirdmenu)
                                                    ->where('id_fourthmenu', $menu->id_fourthmenu)
                                                    ->where('id_level', $level->id_level)
                                                    ->first();
                                                // Jika data sudah ada, set $checked menjadi 'checked'
                                                if ($accessmenu) {
                                                    $checked = 'checked';
                                                }
                                            @endphp
                                            <tr>
                                                <input type="hidden" name="id_level[]" id="id_level" value="{{ $level->id_level }}">
                                                <td>{{ $i++ }}</td>
                                                <td><button type="button" class="btn btn-primary">{{ implode(' > ', array_filter([$menu->firstmenu_name, $menu->secondmenu_name, $menu->thirdmenu_name, $menu->fourthmenu_name])) }}</button></td>
                                                <td>
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="id_menu[]" id="id_menu" value="{{ $menu->id_firstmenu . ',' . $menu->id_secondmenu . ',' . $menu->id_thirdmenu . ',' . $menu->id_fourthmenu }}" {{ $checked }}>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Aktif</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
@endsection

@section('script')
@endsection

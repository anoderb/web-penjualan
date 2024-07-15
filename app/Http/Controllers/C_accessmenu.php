<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_accessmenu;

class C_accessmenu extends Controller
{
    protected $menu_byidlevel;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->id_level) {
                $this->menu_byidlevel = M_menu::menu_byidlevel(auth()->user()->id_level);
            }
            return $next($request);
        });
    }

    public function index()
    {
        // 
    }

    public function create(string $id)
    {
        $data = [
            'title'          => 'Buat Akses Menu',
            'menu_byidlevel' => $this->menu_byidlevel,
            'level'          => M_accessmenu::level($id),
            'menus'          => M_accessmenu::menus()
        ];
        return view('accessmenu.V_accessmenu_edit', $data);
    }

    public function store(Request $request, string $id)
    {
        // Menggunakan metode delete untuk menghapus semua accessmenu yang terkait dengan id_level yang diberikan
        M_accessmenu::where('id_level', $id)->delete();

        if ($request->has('id_menu') && is_array($request->id_menu)) {
            // Looping setiap menu yang dipilih
            foreach ($request->id_menu as $menu) {
                // Memisahkan nilai id menu dari nilai yang dipilih
                list($id_firstmenu, $id_secondmenu, $id_thirdmenu, $id_fourthmenu) = explode(',', $menu);

                // Jika id menu kosong, tetapkan nilainya menjadi null
                $id_firstmenu  = $id_firstmenu ? $id_firstmenu : null;
                $id_secondmenu = $id_secondmenu ? $id_secondmenu : null;
                $id_thirdmenu  = $id_thirdmenu ? $id_thirdmenu : null;
                $id_fourthmenu = $id_fourthmenu ? $id_fourthmenu : null;

                // Memasukkan data baru ke dalam tabel accessmenu
                M_accessmenu::create([
                    'created_by'    => Auth::user()->name,
                    'id_level'      => $id,
                    'id_firstmenu'  => $id_firstmenu,
                    'id_secondmenu' => $id_secondmenu,
                    'id_thirdmenu'  => $id_thirdmenu,
                    'id_fourthmenu' => $id_fourthmenu
                ]);
            }
        }

        return redirect()->route('level_index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // 
    }

    public function update(Request $request, string $id)
    {
        //  
    }

    public function destroy(string $id)
    {
        // 
    }
}

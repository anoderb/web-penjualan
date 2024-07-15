<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_level;

class C_level extends Controller
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
        $data = [
            'title'          => 'Level',
            'menu_byidlevel' => $this->menu_byidlevel,
            'levels'         => M_level::orderBy('id_level', 'DESC')->get()
        ];

        return view('level.V_level', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $level             = new M_level();
        $level->created_by = Auth::user()->name;
        $level->level_name = $request->level_name;
        $level->save();

        return redirect()->route('level_index')->with('success', 'Data berhasil ditambah.');
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
        $request->validate([
            'level_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data data gagal diperbarui.')
        ]);

        $level = M_level::findOrFail($id);

        $level->updated_by = Auth::user()->name;
        $level->level_name = $request->level_name;
        $level->save();

        return redirect()->route('level_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $level = M_level::findOrFail($id);
        $level->delete();

        return redirect()->route('level_index')->with('success', 'Data berhasil dihapus.');
    }
}

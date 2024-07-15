<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_category;

class C_category extends Controller
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
            'title'          => 'Data Kategori',
            'menu_byidlevel' => $this->menu_byidlevel,
            'categories'     => M_category::orderBy('id_category', 'DESC')->get()
        ];

        return view('category.V_category', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $category                = new M_category();
        $category->created_by    = Auth::user()->name;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('category_index')->with('success', 'Data berhasil ditambah.');
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
            'category_name' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $category = M_category::findOrFail($id);

        $category->updated_by    = Auth::user()->name;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('category_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $category = M_category::findOrFail($id);
        $category->delete();

        return redirect()->route('category_index')->with('success', 'Data berhasil dihapus.');
    }
}

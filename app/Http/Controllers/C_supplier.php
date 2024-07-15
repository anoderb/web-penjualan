<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_supplier;

class C_supplier extends Controller
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
            'title'          => 'Data Pemasok',
            'menu_byidlevel' => $this->menu_byidlevel,
            'suppliers'      => M_supplier::orderBy('id_supplier', 'DESC')->get()
        ];

        return view('supplier.V_supplier', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'address'       => 'required|string',
            'no_telp'       => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $supplier                = new M_supplier();
        $supplier->created_by    = Auth::user()->name;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address       = $request->address;
        $supplier->no_telp       = $request->no_telp;
        $supplier->save();

        return redirect()->route('supplier_index')->with('success', 'Data berhasil ditambah.');
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
            'supplier_name' => 'required|string|max:255',
            'address'       => 'required|string',
            'no_telp'       => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $supplier = M_supplier::findOrFail($id);

        $supplier->updated_by    = Auth::user()->name;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address       = $request->address;
        $supplier->no_telp       = $request->no_telp;
        $supplier->save();

        return redirect()->route('supplier_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $supplier = M_supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier_index')->with('success', 'Data berhasil dihapus.');
    }
}

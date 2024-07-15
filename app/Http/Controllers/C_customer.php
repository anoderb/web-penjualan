<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_customer;

class C_customer extends Controller
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
            'title'          => 'Data Konsumen',
            'menu_byidlevel' => $this->menu_byidlevel,
            'customers'      => M_customer::orderBy('id_customer', 'DESC')->get()
        ];

        return view('customer.V_customer', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'        => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'no_telp'       => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $customer                = new M_customer();
        $customer->created_by    = Auth::user()->name;
        $customer->no_ktp        = $request->no_ktp;
        $customer->customer_name = $request->customer_name;
        $customer->address       = $request->address;
        $customer->no_telp       = $request->no_telp;
        $customer->save();

        return redirect()->route('customer_index')->with('success', 'Data berhasil ditambah.');
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
            'no_ktp'        => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'no_telp'       => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $customer = M_customer::findOrFail($id);

        $customer->updated_by    = Auth::user()->name;
        $customer->no_ktp        = $request->no_ktp;
        $customer->customer_name = $request->customer_name;
        $customer->address       = $request->address;
        $customer->no_telp       = $request->no_telp;
        $customer->save();

        return redirect()->route('customer_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $customer = M_customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer_index')->with('success', 'Data berhasil dihapus.');
    }
}

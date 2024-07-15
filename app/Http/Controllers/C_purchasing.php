<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_purchasing;
use App\Models\M_purchasing_detail;
use App\Models\M_supplier;
use App\Models\M_product;

class C_purchasing extends Controller
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
            'title'          => 'Data Pembelian',
            'menu_byidlevel' => $this->menu_byidlevel,
            'purchasings'    => M_purchasing::with('supplier')->orderBy('id_purchasing', 'DESC')->get(),
            'suppliers'      => M_supplier::orderBy('supplier_name', 'ASC')->get()
        ];

        return view('purchasing.V_purchasing', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_invoice'  => 'required|string|max:255|unique:tb_purchasings,no_invoice',
            'id_supplier' => 'required|string',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $purchasing              = new M_purchasing();
        $purchasing->created_by  = Auth::user()->name;
        $purchasing->no_invoice  = $request->no_invoice;
        $purchasing->id_supplier = $request->id_supplier;
        $purchasing->save();

        return redirect()->route('purchasing_index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = [
            'title'              => 'Detail Pembelian',
            'menu_byidlevel'     => $this->menu_byidlevel,
            'purchasing'         => M_purchasing::with('supplier')->find($id),
            'products'           => M_product::orderBy('product_name', 'ASC')->get(),
            'purchasing_details' => M_purchasing_detail::with('product')->orderBy('id_purchasing_detail', 'DESC')->where('id_purchasing', $id)->get()
        ];

        return view('purchasing.V_purchasing_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_invoice'  => 'required|string|max:255',
            'id_supplier' => 'required|string',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $purchasing = M_purchasing::findOrFail($id);

        $purchasing->updated_by  = Auth::user()->name;
        $purchasing->no_invoice  = $request->no_invoice;
        $purchasing->id_supplier = $request->id_supplier;
        $purchasing->save();

        return redirect()->route('purchasing_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $purchasing = M_purchasing::findOrFail($id);
        $purchasing->delete();

        return redirect()->route('purchasing_index')->with('success', 'Data berhasil dihapus.');
    }

    public function store_purchasing_detail(Request $request, string $id)
    {
        $request->validate([
            'id_product'        => 'required|string',
            'qty'               => 'required|string|max:255',
            'unit'              => 'required|string|max:255',
            'price_purchase'    => 'required|string|max:255',
            'qty_purchase'      => 'required|string|max:255',
            'subtotal_purchase' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $purchasing_detail                = new M_purchasing_detail();
        $purchasing_detail->created_by    = Auth::user()->name;
        $purchasing_detail->id_purchasing = $id;

        $productId                     = explode(',', $request->id_product)[0];
        $purchasing_detail->id_product = $productId;

        $purchasing_detail->price_purchase    = $request->price_purchase;
        $purchasing_detail->qty_purchase      = $request->qty_purchase;
        $purchasing_detail->subtotal_purchase = $request->subtotal_purchase;
        $purchasing_detail->save();

        $purchasing_byid = M_purchasing_detail::where('id_purchasing', $id)->get();
        $total = $purchasing_byid->sum('subtotal_purchase');
        $purchasing = M_purchasing::findOrFail($id);
        $purchasing->total = $total;
        $purchasing->save();

        return redirect()->route('purchasing_edit', $id)->with('success', 'Data berhasil ditambah.');
    }

    public function destroy_purchasing_detail(string $id, string $id_purchasing)
    {
        $purchasing_detail = M_purchasing_detail::findOrFail($id);
        $purchasing_detail->delete();

        $purchasing_byid = M_purchasing_detail::where('id_purchasing', $id_purchasing)->get();
        $total = $purchasing_byid->sum('subtotal_purchase');
        $purchasing = M_purchasing::findOrFail($id_purchasing);
        $purchasing->total = $total;
        $purchasing->save();

        return redirect()->route('purchasing_edit', $id_purchasing)->with('success', 'Data berhasil dihapus.');
    }
}

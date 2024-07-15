<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_sales;
use App\Models\M_sales_detail;
use App\Models\M_customer;
use App\Models\M_product;

class C_sales extends Controller
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
            'title'          => 'Data Penjualan',
            'menu_byidlevel' => $this->menu_byidlevel,
            'sales'          => M_sales::with('customer')->orderBy('id_sales', 'DESC')->get(),
            'customers'      => M_customer::orderBy('customer_name', 'ASC')->get()
        ];

        return view('sales.V_sales', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required|string',
            'sales_type'  => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $sales              = new M_sales();
        $sales->created_by  = Auth::user()->name;
        $sales->no_invoice  = 'KDS' . rand(0000, 9999);
        $sales->id_customer = $request->id_customer;
        $sales->sales_type  = $request->sales_type;
        $sales->status_sale = 'Proses';
        $sales->save();

        return redirect()->route('sales_index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = [
            'title'          => 'Detail Penjualan',
            'menu_byidlevel' => $this->menu_byidlevel,
            'sales'          => M_sales::with('customer')->find($id),
            'products'       => M_product::orderBy('product_name', 'ASC')->get(),
            'sales_details'  => M_sales_detail::with('product')->orderBy('id_sales_detail', 'DESC')->where('id_sales', $id)->get()
        ];

        return view('sales.V_sales_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_customer' => 'required|string',
            'sales_type'  => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $sales = M_sales::findOrFail($id);

        $sales->updated_by  = Auth::user()->name;
        $sales->id_customer = $request->id_customer;
        $sales->sales_type  = $request->sales_type;
        $sales->save();

        return redirect()->route('sales_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $sales = M_sales::findOrFail($id);
        $sales->delete();

        return redirect()->route('sales_index')->with('success', 'Data berhasil dihapus.');
    }

    public function store_sales_detail(Request $request, string $id)
    {
        $request->validate([
            'product_code' => 'required|string|max:255',
            'qty_sale'     => 'required|string|max:255',
        ], [
            'product_code.required' => 'Kode produk harus diisi.',
            'qty_sale.required'     => 'Jumlah penjualan harus diisi.',
            'qty_sale.integer'      => 'Jumlah penjualan harus berupa angka.',
        ]);

        // Cari produk berdasarkan product_code
        $product = M_product::where('product_code', $request->product_code)->first();

        // Jika produk tidak ditemukan, kembalikan error
        if (!$product) {
            return redirect()->back()->withErrors(['product_code' => 'Kode produk tidak ditemukan di database.']);
        }

        // Validasi bahwa qty_sale tidak lebih dari qty yang ada di database
        if ($request->qty_sale > $product->qty) {
            return redirect()->back()->withErrors(['qty_sale' => 'Jumlah penjualan melebihi jumlah yang tersedia.']);
        }

        $sales_detail             = new M_sales_detail();
        $sales_detail->created_by = Auth::user()->name;
        $sales_detail->id_sales   = $id;

        $sales_detail->id_product = $product->id_product;

        $sales_detail->price_sale    = $product->price_sale;
        $sales_detail->qty_sale      = $request->qty_sale;
        $sales_detail->discount_sale = $product->discount;
        $sales_detail->subtotal_sale = (($product->price_sale * $request->qty_sale) - $product->discount);
        $sales_detail->save();

        $sales_byid   = M_sales_detail::where('id_sales', $id)->get();
        $total        = $sales_byid->sum('subtotal_sale');
        $sales        = M_sales::findOrFail($id);
        $sales->total = $total;
        $sales->save();

        return redirect()->route('sales_edit', $id)->with('success', 'Data berhasil ditambah.');
    }

    public function destroy_sales_detail(string $id, string $id_sales)
    {
        $sales_detail = M_sales_detail::findOrFail($id);
        $sales_detail->delete();

        $sales_byid   = M_sales_detail::where('id_sales', $id_sales)->get();
        $total        = $sales_byid->sum('subtotal_sale');
        $sales        = M_sales::findOrFail($id_sales);
        $sales->total = $total;
        $sales->save();

        return redirect()->route('sales_edit', $id_sales)->with('success', 'Data berhasil dihapus.');
    }

    public function update_sales_payment(Request $request, string $id)
    {
        $request->validate([
            'payment'      => 'required|string|max:255',
            'change_money' => 'required|string|max:255',
        ], [
            Session::flash('error', 'Data gagal dibayar.')
        ]);

        $sales = M_sales::findOrFail($id);

        $sales->updated_by   = Auth::user()->name;
        $sales->payment      = $request->payment;
        $sales->change_money = $request->change_money;
        $sales->status_sale = 'Selesai';
        $sales->save();

        return redirect()->route('sales_index')->with('success', 'Data berhasil dibayar.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_product;
use App\Models\M_category;

class C_product extends Controller
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
            'title'          => 'Data Produk',
            'menu_byidlevel' => $this->menu_byidlevel,
            'products'       => M_product::with('category')->orderBy('id_product', 'DESC')->get()
        ];

        return view('product.V_product', $data);
    }

    public function create()
    {
        $data = [
            'title'          => 'Tambah Produk',
            'menu_byidlevel' => $this->menu_byidlevel,
            'categories'     => M_category::orderBy('category_name', 'ASC')->get()
        ];

        return view('product.V_product_create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'  => 'required|string|max:255',
            'id_category'   => 'required|string',
            'qty'           => 'required|string',
            'unit'          => 'required|string|max:255',
            'price_sale'    => 'required|string|max:255',
            'discount'      => 'required|string|max:255',
            'description'   => 'required|string',
            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $product               = new M_product();
        $product->created_by   = Auth::user()->name;
        $product->product_code = 'KDP' . rand(0000, 9999);
        $product->product_name = $request->product_name;
        $product->id_category  = $request->id_category;
        $product->qty          = $request->qty;
        $product->unit         = $request->unit;
        $product->price_sale   = $request->price_sale;
        $product->discount     = $request->discount;
        $product->description  = $request->description;

        if ($request->hasFile('product_photo')) {
            $file     = $request->file('product_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/product'), $filename);
            $product->product_photo = $filename;
        }

        $product->save();

        return redirect()->route('product_index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = [
            'title'          => 'Ubah Produk',
            'menu_byidlevel' => $this->menu_byidlevel,
            'product'        => M_product::find($id),
            'categories'     => M_category::orderBy('category_name', 'ASC')->get()
        ];

        return view('product.V_product_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name'  => 'required|string|max:255',
            'id_category'   => 'required|string',
            'qty'           => 'required|string',
            'unit'          => 'required|string|max:255',
            'price_sale'    => 'required|string|max:255',
            'discount'      => 'required|string|max:255',
            'description'   => 'required|string',
            'product_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $product = M_product::findOrFail($id);

        $product->updated_by   = Auth::user()->name;
        $product->product_name = $request->product_name;
        $product->id_category  = $request->id_category;
        $product->qty          = $request->qty;
        $product->unit         = $request->unit;
        $product->price_sale   = $request->price_sale;
        $product->discount     = $request->discount;

        $product_byid = M_product::findOrFail($id);
        if ($request->hasFile('product_photo')) {
            $imagePath = public_path('assets/images/product/' . $product_byid->product_photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($request->hasFile('product_photo')) {
            $file     = $request->file('product_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/product'), $filename);
            $product->product_photo = $filename;
        }

        $product->save();

        return redirect()->route('product_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $product_byid = M_product::findOrFail($id);

        if ($product_byid->product_photo) {
            $imagePath = public_path('assets/images/product/' . $product_byid->product_photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product = M_product::findOrFail($id);
        $product->delete();

        return redirect()->route('product_index')->with('success', 'Data berhasil dihapus.');
    }
}

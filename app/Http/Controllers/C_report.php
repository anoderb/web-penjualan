<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_supplier;
use App\Models\M_product;
use App\Models\M_customer;
use App\Models\M_purchasing;
use App\Models\M_purchasing_detail;
use App\Models\M_sales;
use App\Models\M_sales_detail;

class C_report extends Controller
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

    public function supplier()
    {
        $data = [
            'title'          => 'Laporan Pemasok',
            'menu_byidlevel' => $this->menu_byidlevel,
            'suppliers'      => M_supplier::orderBy('id_supplier', 'DESC')->get()
        ];

        return view('report.V_report_supplier', $data);
    }

    public function product()
    {
        $data = [
            'title'          => 'Laporan Produk',
            'menu_byidlevel' => $this->menu_byidlevel,
            'products'       => M_product::with('category')->orderBy('id_product', 'DESC')->get()
        ];

        return view('report.V_report_product', $data);
    }

    public function customer()
    {
        $data = [
            'title'          => 'Laporan Konsumen',
            'menu_byidlevel' => $this->menu_byidlevel,
            'customers'      => M_customer::orderBy('id_customer', 'DESC')->get()
        ];

        return view('report.V_report_customer', $data);
    }

    public function purchasing()
    {
        $data = [
            'title'          => 'Laporan Pembelian',
            'menu_byidlevel' => $this->menu_byidlevel,
            'purchasings'         => M_purchasing::with('supplier')->get(),
            'purchasing_details' => M_purchasing_detail::with('product')->orderBy('id_purchasing_detail', 'DESC')->get()
        ];

        return view('report.V_report_purchasing', $data);
    }

    public function sales()
    {
        $data = [
            'title'          => 'Laporan Penjualan',
            'menu_byidlevel' => $this->menu_byidlevel,
            'sales'         => M_sales::with('customer')->get(),
            'sales_details' => M_sales_detail::with('product')->orderBy('id_sales_detail', 'DESC')->get()
        ];

        return view('report.V_report_sales', $data);
    }
}

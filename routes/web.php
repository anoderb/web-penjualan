<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_user::class, 'index'])->name('user_index');
    Route::get('/create', [App\Http\Controllers\C_user::class, 'create'])->name('user_create');
    Route::post('/store', [App\Http\Controllers\C_user::class, 'store'])->name('user_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_user::class, 'edit'])->name('user_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_user::class, 'update'])->name('user_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_user::class, 'destroy'])->name('user_destroy');
});

Route::prefix('menu')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_menu::class, 'index'])->name('menu_index');
    Route::post('/firstmenu_store', [App\Http\Controllers\C_menu::class, 'firstmenu_store'])->name('menu_firstmenu_store');
    Route::post('/secondmenu_store', [App\Http\Controllers\C_menu::class, 'secondmenu_store'])->name('menu_secondmenu_store');
    Route::post('/thirdmenu_store', [App\Http\Controllers\C_menu::class, 'thirdmenu_store'])->name('menu_thirdmenu_store');
    Route::post('/fourthmenu_store', [App\Http\Controllers\C_menu::class, 'fourthmenu_store'])->name('menu_fourthmenu_store');

    Route::put('/firstmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'firstmenu_update'])->name('menu_firstmenu_update');
    Route::put('/secondmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'secondmenu_update'])->name('menu_secondmenu_update');
    Route::put('/thirdmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'thirdmenu_update'])->name('menu_thirdmenu_update');
    Route::put('/fourthmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'fourthmenu_update'])->name('menu_fourthmenu_update');

    Route::delete('/firstmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'firstmenu_destroy'])->name('menu_firstmenu_destroy');
    Route::delete('/secondmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'secondmenu_destroy'])->name('menu_secondmenu_destroy');
    Route::delete('/thirdmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'thirdmenu_destroy'])->name('menu_thirdmenu_destroy');
    Route::delete('/fourthmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'fourthmenu_destroy'])->name('menu_fourthmenu_destroy');

    Route::get('/firstmenu_list', [App\Http\Controllers\C_menu::class, 'firstmenu_list'])->name('menu_firstmenu_list');
    Route::get('/secondmenu_list', [App\Http\Controllers\C_menu::class, 'secondmenu_list'])->name('menu_secondmenu_list');
    Route::get('/thirdmenu_list', [App\Http\Controllers\C_menu::class, 'thirdmenu_list'])->name('menu_thirdmenu_list');
});

Route::prefix('level')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_level::class, 'index'])->name('level_index');
    Route::get('/create', [App\Http\Controllers\C_level::class, 'create'])->name('level_create');
    Route::post('/store', [App\Http\Controllers\C_level::class, 'store'])->name('level_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_level::class, 'edit'])->name('level_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_level::class, 'update'])->name('level_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_level::class, 'destroy'])->name('level_destroy');
});

Route::prefix('accessmenu')->middleware('auth')->group(function () {
    Route::get('/create/{id}', [App\Http\Controllers\C_accessmenu::class, 'create'])->name('accessmenu_create');
    Route::post('/store/{id}', [App\Http\Controllers\C_accessmenu::class, 'store'])->name('accessmenu_store');
});

Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_category::class, 'index'])->name('category_index');
    Route::get('/create', [App\Http\Controllers\C_category::class, 'create'])->name('category_create');
    Route::post('/store', [App\Http\Controllers\C_category::class, 'store'])->name('category_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_category::class, 'edit'])->name('category_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_category::class, 'update'])->name('category_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_category::class, 'destroy'])->name('category_destroy');
});

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_product::class, 'index'])->name('product_index');
    Route::get('/create', [App\Http\Controllers\C_product::class, 'create'])->name('product_create');
    Route::post('/store', [App\Http\Controllers\C_product::class, 'store'])->name('product_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_product::class, 'edit'])->name('product_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_product::class, 'update'])->name('product_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_product::class, 'destroy'])->name('product_destroy');
});

Route::prefix('supplier')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_supplier::class, 'index'])->name('supplier_index');
    Route::get('/create', [App\Http\Controllers\C_supplier::class, 'create'])->name('supplier_create');
    Route::post('/store', [App\Http\Controllers\C_supplier::class, 'store'])->name('supplier_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_supplier::class, 'edit'])->name('supplier_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_supplier::class, 'update'])->name('supplier_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_supplier::class, 'destroy'])->name('supplier_destroy');
});

Route::prefix('purchasing')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_purchasing::class, 'index'])->name('purchasing_index');
    Route::get('/create', [App\Http\Controllers\C_purchasing::class, 'create'])->name('purchasing_create');
    Route::post('/store', [App\Http\Controllers\C_purchasing::class, 'store'])->name('purchasing_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_purchasing::class, 'edit'])->name('purchasing_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_purchasing::class, 'update'])->name('purchasing_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_purchasing::class, 'destroy'])->name('purchasing_destroy');

    Route::put('/store_purchasing_detail/{id}', [App\Http\Controllers\C_purchasing::class, 'store_purchasing_detail'])->name('store_purchasing_detail');
    Route::delete('/destroy_purchasing_detail/{id}/{id_purchasing}', [App\Http\Controllers\C_purchasing::class, 'destroy_purchasing_detail'])->name('destroy_purchasing_detail');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_customer::class, 'index'])->name('customer_index');
    Route::get('/create', [App\Http\Controllers\C_customer::class, 'create'])->name('customer_create');
    Route::post('/store', [App\Http\Controllers\C_customer::class, 'store'])->name('customer_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_customer::class, 'edit'])->name('customer_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_customer::class, 'update'])->name('customer_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_customer::class, 'destroy'])->name('customer_destroy');
});

Route::prefix('sales')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_sales::class, 'index'])->name('sales_index');
    Route::get('/create', [App\Http\Controllers\C_sales::class, 'create'])->name('sales_create');
    Route::post('/store', [App\Http\Controllers\C_sales::class, 'store'])->name('sales_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_sales::class, 'edit'])->name('sales_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_sales::class, 'update'])->name('sales_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_sales::class, 'destroy'])->name('sales_destroy');

    Route::put('/store_sales_detail/{id}', [App\Http\Controllers\C_sales::class, 'store_sales_detail'])->name('store_sales_detail');
    Route::delete('/destroy_sales_detail/{id}/{id_sales}', [App\Http\Controllers\C_sales::class, 'destroy_sales_detail'])->name('destroy_sales_detail');
    Route::put('/update_sales_payment/{id}', [App\Http\Controllers\C_sales::class, 'update_sales_payment'])->name('update_sales_payment');
});

Route::prefix('report')->middleware('auth')->group(function () {
    Route::get('/supplier', [App\Http\Controllers\C_report::class, 'supplier'])->name('report_supplier');
    Route::get('/product', [App\Http\Controllers\C_report::class, 'product'])->name('report_product');
    Route::get('/customer', [App\Http\Controllers\C_report::class, 'customer'])->name('report_customer');
    Route::get('/purchasing', [App\Http\Controllers\C_report::class, 'purchasing'])->name('report_purchasing');
    Route::get('/sales', [App\Http\Controllers\C_report::class, 'sales'])->name('report_sales');
});

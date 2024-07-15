<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_sales_detail extends Model
{
    use HasFactory;

    protected $table = 'tb_sales_details';

    protected $primaryKey = 'id_sales_detail';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'no_invoice',
        'id_sales',
        'id_product',
        'price_sale',
        'qty_sale',
        'subtotal_sale',
        'discount_sale',
    ];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(M_product::class, 'id_product', 'id_product');
    }
}

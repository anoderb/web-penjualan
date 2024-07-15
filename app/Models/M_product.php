<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_product extends Model
{
    use HasFactory;

    protected $table = 'tb_products';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'product_name',
        'id_category',
        'qty',
        'unit',
        'price_sale',
        'discount',
        'description',
        'product_photo',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(M_category::class, 'id_category', 'id_category');
    }

    public function purchasing_details()
    {
        return $this->hasMany(M_purchasing_detail::class, 'id_product', 'id_product');
    }

    public function sales_details()
    {
        return $this->hasMany(M_sales_detail::class, 'id_product', 'id_product');
    }
}

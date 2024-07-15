<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_purchasing_detail extends Model
{
    use HasFactory;

    protected $table = 'tb_purchasing_details';

    protected $primaryKey = 'id_purchasing_detail';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'no_invoice',
        'id_purchasing',
        'id_product',
        'price_purchase',
        'qty_purchase',
        'subtotal_purchase',
    ];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(M_product::class, 'id_product', 'id_product');
    }
}

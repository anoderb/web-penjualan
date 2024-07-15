<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_sales extends Model
{
    use HasFactory;

    protected $table = 'tb_sales';

    protected $primaryKey = 'id_sales';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'no_invoice',
        'sales_type',
        'id_customer',
        'total',
        'payment',
        'change_money',
        'status_sale',
    ];

    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo(M_customer::class, 'id_customer', 'id_customer');
    }
}

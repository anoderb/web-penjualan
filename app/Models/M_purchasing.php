<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_purchasing extends Model
{
    use HasFactory;

    protected $table = 'tb_purchasings';

    protected $primaryKey = 'id_purchasing';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'no_invoice',
        'id_supplier',
        'total',
    ];

    public $timestamps = true;

    public function supplier()
    {
        return $this->belongsTo(M_supplier::class, 'id_supplier', 'id_supplier');
    }
}

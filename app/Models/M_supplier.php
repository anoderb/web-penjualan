<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_supplier extends Model
{
    use HasFactory;

    protected $table = 'tb_suppliers';

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'supplier_name',
        'address',
        'no_telp',
    ];

    public $timestamps = true;

    public function purchasings()
    {
        return $this->hasMany(M_purchasing::class, 'id_supplier', 'id_supplier');
    }
}

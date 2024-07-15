<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_customer extends Model
{
    use HasFactory;

    protected $table = 'tb_customers';

    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'no_ktp',
        'custumer_name',
        'address',
        'no_telp'
    ];

    public $timestamps = true;
}

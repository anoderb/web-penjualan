<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_category extends Model
{
    use HasFactory;

    protected $table = 'tb_categories';

    protected $primaryKey = 'id_category';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'category_name',
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(M_product::class, 'id_category', 'id_category');
    }
}

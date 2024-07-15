<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_level extends Model
{
    use HasFactory;

    protected $table = 'tb_levels';

    protected $primaryKey = 'id_level';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'level_name',
        'create',
        'read',
        'update',
        'delete',
    ];

    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(M_user::class, 'id_level');
    }
}

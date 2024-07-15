<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_user extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'created_by',
        'updated_by',
        'activity_log',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'id_level',
        'no_hp',
        'status',
    ];

    public $timestamps = true;

    public function level()
    {
        return $this->belongsTo(M_level::class, 'id_level');
    }
}

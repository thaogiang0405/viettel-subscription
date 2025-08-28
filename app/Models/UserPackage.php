<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $table = 'user_package';

    protected $fillable = [
    'user_id',
    'goi_cuoc_id',  
    'sim',// đổi package_id thành goi_cuoc_id
    'registered_at',
    'status',
    'note',
    'customer_name',
        'customer_phone',
        'customer_email',
        'cmnd_cccd',
        'dia_chi',
];

    public function goiCuoc()
    {
        return $this->belongsTo(GoiCuoc::class, 'goi_cuoc_id');
    }


    protected $casts = [
        'registered_at' => 'datetime',
    ];

    public $timestamps = true;
}

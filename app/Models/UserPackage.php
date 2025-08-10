<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPackage extends Pivot
{
    protected $table = 'user_package';

    protected $fillable = [
    'user_id',
    'goi_cuoc_id',  
    'sim',// đổi package_id thành goi_cuoc_id
    'registered_at',
    'status',
    'note',
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

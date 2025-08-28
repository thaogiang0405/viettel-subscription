<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'duration',
        'type',
        'data_amount',
        'description',
    ];

    /**
     * Các gói cước đã được đăng ký bởi người dùng
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_package')
                    ->using(UserPackage::class)
                    ->withPivot('registered_at', 'status', 'note')
                    ->withTimestamps();
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $table = 'sim'; 

    protected $fillable = [
        'so_dien_thoai',
        'phi_chon_so',
        'loai_sim',
        'da_chon',
    ];
}

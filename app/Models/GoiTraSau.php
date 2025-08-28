<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoiTraSau extends Model
{
    use HasFactory;

    protected $table = 'goi_tra_sau';

    protected $fillable = [
        'ma_goi',
        'cuoc_phi',
        'dung_luong',
        'mp_noi_mang',
        'mp_ngoai_mang',
        'sms',
        'mybox',
        'tv360',
        'ung_dung_khac',
    ];
}

?>
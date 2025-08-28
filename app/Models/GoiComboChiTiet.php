<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoiComboChiTiet extends Model
{
    use HasFactory;

    protected $table = 'goi_combo_chi_tiet';

    protected $fillable = [
        'goi_cuoc_id',
        'mp_goi_mang_khac',
        'mp_goi_viettel',
        'mp_tv360',
    ];

    public function goiCuoc()
    {
        return $this->belongsTo(GoiCuoc::class, 'goi_cuoc_id');
    }
}

?>
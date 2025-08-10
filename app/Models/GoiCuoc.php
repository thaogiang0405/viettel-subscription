<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoiCuoc extends Model
{
    use HasFactory;

    protected $table = 'goi_cuoc';

    protected $fillable = [
    'ma_goi',
    'ten_goi',
    'loai_goi',
    'danh_muc',
    'la_khuyen_mai',
    'dung_luong',
    'cuoc_phi',
    'chu_ky',
    'mang',
    'uu_diem',
    'cu_phap',
    'mo_ta',
    'ung_dung_mien_phi',
    'pbh', // <--- thêm dòng này nếu bạn thêm cột 'pbh' vào bảng 'goi_cuoc'
];


    public function comboChiTiet()
    {
        return $this->hasOne(GoiComboChiTiet::class, 'goi_cuoc_id');
    }

    public function vungZone()
    {
        return $this->hasOne(VungZone::class, 'goi_cuoc_id');
    }
}
?>

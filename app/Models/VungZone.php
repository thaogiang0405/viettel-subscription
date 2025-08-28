<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VungZone extends Model
{
    use HasFactory;

    protected $table = 'vung_zone';

    protected $fillable = [
        'goi_cuoc_id',
        'data_quoc_gia',
        'data_zone',
        'zone_ap_dung',
    ];

    public function goiCuoc()
    {
        return $this->belongsTo(GoiCuoc::class, 'goi_cuoc_id');
    }
}

?>
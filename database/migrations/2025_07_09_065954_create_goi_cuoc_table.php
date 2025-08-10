<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('goi_cuoc', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('ma_goi', 20)->unique(); // Mã gói cước
    $table->string('ten_goi', 100); // Tên gói
    $table->enum('loai_goi', ['DATA', 'DATA_ZONE', 'COMBO', 'DAC_BIET'])->nullable(); // Loại gói
    $table->enum('danh_muc', ['tra_truoc', 'tra_sau'])->default('tra_truoc'); // Danh mục
    $table->boolean('la_khuyen_mai')->default(false); // Có phải khuyến mãi
    $table->string('dung_luong', 50)->nullable(); // Dung lượng
    $table->integer('cuoc_phi')->nullable(); // Giá
    $table->integer('chu_ky')->nullable()->comment('Đơn vị: ngày hoặc tháng'); // Chu kỳ
    $table->enum('mang', ['4G', '5G'])->default('4G'); // Mạng áp dụng
    $table->string('uu_diem', 50)->nullable(); // Ưu điểm
    $table->text('cu_phap')->nullable(); // Cú pháp
    $table->text('mo_ta')->nullable(); // Mô tả
    $table->text('ung_dung_mien_phi')->nullable(); // Ứng dụng miễn phí
    $table->string('pbh', 20)->nullable()->comment('Phần trăm hoa hồng');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goi_cuoc');
    }
};

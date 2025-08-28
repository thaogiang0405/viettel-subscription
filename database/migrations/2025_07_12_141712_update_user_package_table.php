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
        Schema::table('user_package', function (Blueprint $table) {
            // Bỏ foreign key hiện tại của package_id
            $table->dropForeign(['package_id']);
            // Đổi tên cột package_id thành goi_cuoc_id
            $table->renameColumn('package_id', 'goi_cuoc_id');
            // Thêm khóa ngoại mới cho goi_cuoc_id tham chiếu bảng goi_cuoc
            $table->foreign('goi_cuoc_id')->references('id')->on('goi_cuoc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_package', function (Blueprint $table) {
            // Bỏ foreign key goi_cuoc_id
            $table->dropForeign(['goi_cuoc_id']);
            // Đổi tên cột goi_cuoc_id về lại package_id
            $table->renameColumn('goi_cuoc_id', 'package_id');
            // Thêm lại khóa ngoại cũ cho package_id
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }
};
?>
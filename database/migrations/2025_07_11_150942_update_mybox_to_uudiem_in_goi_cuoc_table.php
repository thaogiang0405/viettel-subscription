<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('goi_cuoc', function (Blueprint $table) {
            $table->dropColumn('mybox');
            $table->text('uu_diem')->nullable()->after('tv360');
        });
    }

    public function down(): void
    {
        Schema::table('goi_cuoc', function (Blueprint $table) {
            $table->dropColumn('uu_diem');
            $table->string('mybox', 50)->nullable();
        });
    }
};
?>
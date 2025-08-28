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
         Schema::create('goi_combo_chi_tiet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goi_cuoc_id')->constrained('goi_cuoc')->onDelete('cascade');
            $table->string('mp_goi_mang_khac', 100)->nullable();
            $table->string('mp_goi_viettel', 100)->nullable();
            $table->string('mp_tv360', 100)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goi_combo_chi_tiet');
    }
};

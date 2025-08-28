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
         Schema::create('goi_tra_sau', function (Blueprint $table) {
            $table->id();
            $table->string('ma_goi', 20)->unique();
            $table->integer('cuoc_phi')->nullable();
            $table->string('dung_luong', 50)->nullable();
            $table->string('mp_noi_mang', 100)->nullable();
            $table->string('mp_ngoai_mang', 100)->nullable();
            $table->string('sms', 100)->nullable();
            $table->string('mybox', 50)->nullable();
            $table->string('tv360', 50)->nullable();
            $table->text('ung_dung_khac')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goi_tra_sau');
    }
};

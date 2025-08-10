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
    Schema::create('vung_zone', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goi_cuoc_id')->constrained('goi_cuoc')->onDelete('cascade');
            $table->string('data_quoc_gia', 50)->nullable();
            $table->string('data_zone', 50)->nullable();
            $table->text('zone_ap_dung')->nullable();
            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vung_zone');
    }
};

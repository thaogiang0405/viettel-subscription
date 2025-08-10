<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('sim', function (Blueprint $table) {
            $table->id();
            $table->string('so_dien_thoai')->unique(); 
            $table->decimal('phi_chon_so', 10, 0)->default(0); 
            $table->string('loai_sim');  
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sim');
    }
};

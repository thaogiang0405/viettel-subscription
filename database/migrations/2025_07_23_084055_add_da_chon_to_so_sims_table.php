<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_add_da_chon_to_so_sims_table.php
public function up()
{
    Schema::table('sim', function (Blueprint $table) {
        $table->boolean('da_chon')->default(false);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sim', function (Blueprint $table) {
            //
        });
    }
};

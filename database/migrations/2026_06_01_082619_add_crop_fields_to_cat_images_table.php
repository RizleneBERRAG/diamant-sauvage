<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cat_images', function (Blueprint $table) {
            $table->unsignedTinyInteger('position_x')->default(50);
            $table->unsignedTinyInteger('position_y')->default(50);
            $table->decimal('zoom', 4, 2)->default(1);
        });
    }

    public function down(): void
    {
        Schema::table('cat_images', function (Blueprint $table) {
            $table->dropColumn(['position_x', 'position_y', 'zoom']);
        });
    }
};

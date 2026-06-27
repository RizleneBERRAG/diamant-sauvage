<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('cat_images')) {
            return;
        }

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE cat_images MODIFY position_x SMALLINT NOT NULL DEFAULT 50');
            DB::statement('ALTER TABLE cat_images MODIFY position_y SMALLINT NOT NULL DEFAULT 50');
            return;
        }

        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('cat_images', function ($table) {
            $table->smallInteger('position_x')->default(50)->change();
            $table->smallInteger('position_y')->default(50)->change();
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('cat_images')) {
            return;
        }

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE cat_images MODIFY position_x TINYINT UNSIGNED NOT NULL DEFAULT 50');
            DB::statement('ALTER TABLE cat_images MODIFY position_y TINYINT UNSIGNED NOT NULL DEFAULT 50');
            return;
        }

        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('cat_images', function ($table) {
            $table->unsignedTinyInteger('position_x')->default(50)->change();
            $table->unsignedTinyInteger('position_y')->default(50)->change();
        });
    }
};

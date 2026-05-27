<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cat_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cat_id')
                ->constrained('cats')
                ->cascadeOnDelete();

            $table->string('path');
            $table->string('alt')->nullable();
            $table->string('original_name')->nullable();

            $table->boolean('is_main')->default(false);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_images');
    }
};

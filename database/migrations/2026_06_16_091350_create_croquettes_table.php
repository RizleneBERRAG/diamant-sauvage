<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('croquettes', function (Blueprint $table) {
            $table->id();

            $table->string('tag')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('protein')->nullable();
            $table->string('fat')->nullable();
            $table->string('taurine')->nullable();

            $table->longText('composition')->nullable();
            $table->longText('analytical_components')->nullable();
            $table->longText('nutritional_additives')->nullable();
            $table->longText('technological_additives')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('croquettes');
    }
};

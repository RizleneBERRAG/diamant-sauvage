<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matings', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();

            $table->string('father_name');
            $table->string('mother_name');

            $table->string('father_photo')->nullable();
            $table->string('mother_photo')->nullable();

            $table->date('mating_start_date')->nullable();
            $table->date('mating_end_date')->nullable();
            $table->date('expected_birth_date')->nullable();

            $table->string('status')->default('in_progress');

            $table->text('expected_colors')->nullable();
            $table->text('description')->nullable();

            $table->boolean('is_visible')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matings');
    }
};

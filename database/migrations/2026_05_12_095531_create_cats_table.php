<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();

            $table->string('category')->default('female');
            $table->string('sex')->nullable();
            $table->date('birth_date')->nullable();

            $table->string('icad')->nullable();
            $table->string('loof')->nullable();

            $table->string('coat')->nullable();
            $table->string('eyes')->nullable();

            $table->string('availability')->default('to_define');
            $table->string('availability_label')->nullable();

            $table->string('visibility')->default('visible');

            $table->string('price_mode')->default('hidden');
            $table->decimal('price', 10, 2)->nullable();

            $table->text('highlight')->nullable();
            $table->longText('description')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            $table->string('health_hcm')->nullable();
            $table->string('health_pkd')->nullable();
            $table->string('health_fiv_felv')->nullable();
            $table->string('health_pra_b')->nullable();
            $table->string('health_pkdef')->nullable();
            $table->string('health_parents_tests')->nullable();

            $table->boolean('featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
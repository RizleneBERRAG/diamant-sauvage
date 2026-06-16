<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('croquette_sections', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('À la chatterie');
            $table->string('title')->default('Les 3 gammes de croquettes utilisées chez nous.');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('croquette_sections');
    }
};

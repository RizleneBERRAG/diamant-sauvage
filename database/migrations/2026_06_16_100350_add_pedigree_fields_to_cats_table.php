<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cats', function (Blueprint $table) {
            $table->text('pedigree_note')->nullable();
            $table->string('pedigree_pdf')->nullable();
            $table->string('father_photo')->nullable();
            $table->string('mother_photo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('cats', function (Blueprint $table) {
            $table->dropColumn([
                'pedigree_note',
                'pedigree_pdf',
                'father_photo',
                'mother_photo',
            ]);
        });
    }
};

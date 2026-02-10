<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_image')->nullable();
            $table->string('vision_image')->nullable();
            $table->text('vision_text')->nullable();
            $table->text('about_text')->nullable();
            $table->text('vision_text_en')->nullable();
            $table->text('about_text_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

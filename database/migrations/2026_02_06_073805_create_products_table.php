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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->foreignId('client_id') //to make relationship
                  ->constrained('clients', 'client_id')
                  ->onDelete('cascade');
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_name_en')->nullable();
            $table->text('product_description_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

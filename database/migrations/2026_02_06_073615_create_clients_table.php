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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_name');
            $table->string('client_email')->unique();
            $table->string('client_password');
            $table->enum('role', ['admin', 'client'])->default('client');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->string('client_logo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('client_name_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

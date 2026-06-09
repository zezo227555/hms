<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name', 100);
            $table->string('code', 20)->unique();

            // Contact Information
            $table->string('phone', 30)->nullable();
            $table->string('email')->nullable();

            // Location
            $table->string('address')->nullable();
            $table->string('city', 100)->nullable();

            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Additional Information
            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index('name');
            $table->index('status');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};

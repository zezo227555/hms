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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();

            // Branch Relation
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();

            // Basic Information
            $table->string('name', 100);
            $table->string('code', 20);

            // Status
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Additional Information
            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();

            // Constraints
            $table->unique(['branch_id', 'code']);

            // Indexes
            $table->index('branch_id');
            $table->index('name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};

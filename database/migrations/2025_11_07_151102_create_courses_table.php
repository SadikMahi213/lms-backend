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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Course name
            $table->string('short_description')->nullable(); // Short description
            $table->foreignId('teacher_id') // Teacher (relation to users table)
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');
            $table->enum('status', ['published', 'draft', 'archived'])->default('draft'); // Status
            $table->unsignedInteger('enrolled_count')->default(0); // Total enrolled students
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

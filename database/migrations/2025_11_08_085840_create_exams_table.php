<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Exam name
            $table->unsignedBigInteger('course_id'); // কোন course এর exam
            $table->date('exam_date')->nullable();
            $table->integer('total_marks')->default(100);
            $table->timestamps();

            // Foreign key
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};

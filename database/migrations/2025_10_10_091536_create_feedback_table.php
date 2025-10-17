<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('id_feedback'); // Feedback ID
            $table->unsignedBigInteger('student_id'); // Student ID
            $table->foreign('student_id')->references('id_user')->on('users')->onDelete('cascade');

            $table->string('title'); // Title
            $table->text('content'); // Content
            $table->json('attachments')->nullable(); // Attachments

            $table->enum('status', ['pending', 'processed'])->default('pending'); // Status

            $table->unsignedBigInteger('manager_id')->nullable(); // Manager ID
            $table->foreign('manager_id')->references('id_user')->on('users')->onDelete('set null');
            $table->text('response')->nullable(); // Response
            $table->timestamp('processed_at')->nullable(); // Processed at

            $table->timestamps(); // Created at, Updated at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};

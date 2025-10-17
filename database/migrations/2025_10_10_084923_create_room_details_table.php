<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_details', function (Blueprint $table) {
            $table->id('id_room'); // Room ID
            
            // Liên kết tới bảng phong_ktx
            $table->unsignedBigInteger('dormitory_room_id'); // Dormitory room ID
            $table->foreign('dormitory_room_id')->references('id_floor')->on('dormitory_rooms')->onDelete('cascade');
            $table->integer('room_number')->comment('Room number on the floor');
            $table->string('student_name'); // Student name
            $table->string('student_id')->unique(); // Student ID
            $table->string('class'); // Class
            $table->date('birth_date'); // Birth date
            $table->string('phone', 15); // Phone number
            $table->string('address'); // Address
            $table->date('rental_date'); // Rental date

            //  Cột này chứa nhiều ảnh (lưu JSON)
            $table->json('profile_pictures')->nullable()->comment('Up to 3 profile pictures, stored as JSON');

            //  true = đã đóng, false = chưa đóng
            $table->boolean('payment_status')->default(false)->comment('Whether the student has paid for this term');

            $table->timestamps(); // Created at, Updated at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_details');
    }
};

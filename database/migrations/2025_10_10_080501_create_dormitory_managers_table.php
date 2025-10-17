<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dormitory_managers', function (Blueprint $table) {
            $table->id('id_dormitory'); // Dormitory ID
            $table->string('dormitory_name'); // Dormitory name
            $table->integer('floors'); // Number of floors

            // Manager ID
            $table->unsignedBigInteger('manager_id')->nullable();

            $table->integer('room_count'); // Number of rooms
            $table->timestamps(); // Created at, Updated at

            // Foreign key constraint
            $table->foreign('manager_id')
                  ->references('id_user')->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dormitory_managers');
    }
};

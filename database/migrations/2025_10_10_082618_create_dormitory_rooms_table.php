<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dormitory_rooms', function (Blueprint $table) {
            $table->id('id_floor'); // Floor ID
            $table->unsignedBigInteger('dormitory_id'); // Dormitory ID
            $table->integer('floor_number')->comment('Floor number in the building');
            $table->decimal('price', 12, 2)->comment('Price per person or room');
            $table->integer('room_count')->comment('Number of rooms on this floor');
            $table->integer('occupied')->default(0)->comment('Number of people currently staying');
            $table->integer('vacant')->default(0)->comment('Number of vacant spots (max 10 people/room)');
            $table->boolean('rent_paid')->default(false)->comment('Whether rent has been fully paid for this term');
            $table->text('facilities')->nullable()->comment('Facilities and equipment in the room');
            $table->timestamp('last_updated')->useCurrent();
            $table->timestamps(); // Created at, Updated at

            // Foreign key constraints
            $table->foreign('dormitory_id')->references('id_dormitory')->on('dormitory_managers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dormitory_rooms');
    }
};

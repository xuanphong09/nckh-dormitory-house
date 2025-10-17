<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rental_rooms', function (Blueprint $table) {
            $table->id('id_room'); // Primary key
            $table->string('room_name'); // Room name
            $table->string('address'); // Address
            $table->string('owner_name'); // Landlord's name
            $table->string('phone', 15)->nullable(); // Landlord's phone
            $table->string('description')->nullable(); // Short description
            $table->text('detailed_description')->nullable(); // Detailed description
            $table->enum('status', ['available', 'unavailable'])->default('available'); // Status
            $table->string('picture')->nullable(); // Picture
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_rooms');
    }
};

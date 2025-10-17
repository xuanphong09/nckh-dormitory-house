<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); 
            $table->string('username'); 
            $table->string('password'); 
            $table->string('email')->unique(); 
            $table->string('phone', 15)->nullable(); 
            $table->string('full_name')->nullable(); 
            $table->enum('role', ['root', 'admin', 'student'])
                  ->default('student'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

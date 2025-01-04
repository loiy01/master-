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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key reference to users table
            $table->string('service_type'); // Service type as varchar
            $table->dateTime('time'); // Time as datetime
            $table->text('description')->nullable(); // Description as text, nullable
            $table->string('location');
            $table->boolean('show')->default(false);
            $table->timestamps(); // Created at and Updated at timestamps

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

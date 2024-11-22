<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // name
            $table->text('description'); // description
            $table->decimal('price', 10, 2); // price (with decimal places)
            $table->integer('quantity'); // quantity
            $table->unsignedBigInteger('category_id'); // category_id (foreign key)
            $table->string('image'); // image

            // Add foreign key constraint for category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

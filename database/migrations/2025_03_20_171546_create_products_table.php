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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('slug', 60);
            $table->text('description');
            $table->integer('price');
            $table->string('image', 255);
            $table->boolean('active')->default(false);
            $table->decimal('weight')->default(0);
            $table->decimal('height')->default(0);
            $table->decimal('width')->default(0);
            $table->decimal('length')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

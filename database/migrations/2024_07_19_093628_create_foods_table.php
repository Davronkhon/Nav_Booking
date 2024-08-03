<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    * Run the migrations.
    */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_category_id')->constrained('food_categories');
            $table->foreignId('restaurant_id')->constrained('restaurants');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->text('description');
            $table->time('time');
            $table->string('is_active');
            $table->timestamps();
        });
    }

    /*
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};

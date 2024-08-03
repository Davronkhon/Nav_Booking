<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable()->change();
            $table->foreignId('food_id')->constrained('foods');
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity');
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

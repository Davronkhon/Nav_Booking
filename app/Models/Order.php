<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'food_id', 'quantity', 'price', 'total'];


    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

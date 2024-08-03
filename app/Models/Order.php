<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'food_id', 'client_id', 'quantity', 'order_datetime', 'status'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

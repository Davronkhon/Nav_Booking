<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'place_id', 'start_time', 'end_time', 'guests_count', 'status'];

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

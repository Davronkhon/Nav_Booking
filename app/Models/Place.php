<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_id', 'name', 'number', 'description', 'capacity'];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'description'];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id'); 
    }
}

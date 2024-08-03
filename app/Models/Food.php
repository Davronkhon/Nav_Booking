<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['food_category_id', 'restaurant_id', 'name', 'price', 'image',
        'description', 'time', 'is_active'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodcategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }
}

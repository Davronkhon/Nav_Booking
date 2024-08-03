<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    //protected $guarded = [];

    public function foods()
    {
        return $this->hasMany(FoodCategory::class, 'food_category_id');
    }
}

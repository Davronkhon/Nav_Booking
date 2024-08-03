<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['rest_category_id', 'name', 'address', 'phone', 'email'];

    public function restCategory()
    {
        return $this->belongsTo(RestCategory::class, 'rest_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'title',
        'user_id',
        'description',
        'slug',
        'color_id',
        'category_id',
        'model_id',
        'brand_id',
        'count'
    ];

    use HasFactory;
}

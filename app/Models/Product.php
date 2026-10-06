<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Relationships with other models
use App\Models\Category;
use App\Models\Brand;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'uuid',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'is_trending',
        'is_active',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    //use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}


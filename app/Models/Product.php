<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'original_price',
        'stock_quantity',
        'manage_stock',
        'sku',
        'image',
        'images',
        'category_id',
        'status',
        'featured',
        'in_stock',
        'badge',
        'entrepreneur',
        'attributes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'manage_stock' => 'boolean',
        'featured' => 'boolean',
        'in_stock' => 'boolean',
        'images' => 'array',
        'attributes' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getEffectivePriceAttribute()
    {
        return $this->original_price ? $this->price : $this->price;
    }

    public function getSalePriceAttribute()
    {
        return $this->original_price ? $this->price : null;
    }

    public function isInStock(): bool
    {
        return !$this->manage_stock || $this->stock_quantity > 0;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug) && !empty($product->name)) {
                $product->slug = str()->slug($product->name);
            }
        });

        // for updating, we can also update slug if name changes, but this requies additional logic
        // for this demo we will keep it void
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}

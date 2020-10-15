<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'brand',
        'rate',
        'price',
        'offer_price',
        'status', // 1 => exist, 2 => sold
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function scopeWhenSearchPrice($query, $price)
    {
        return $query->when($price, function ($q) use ($price) {
            $min_price = explode('-', $price)[0];
            $max_price = explode('-', $price)[1];
            return $q->whereBetween('price', [$min_price, $max_price])
                    ->orWhereBetween('offer_price', [$min_price, $max_price]);
        });
    }

    public function scopeWhenSearchName($query, $title)
    {
        return $query->when($title, function ($q) use ($title) {
            return $q->where('title', 'like', "%$title%");
        });
    }

    public function scopeSearchCategory($query, $id)
    {
        return $query->whereHas('category', function ($q) use ($id) {
            return $q->where('id', $id);
        });
    }


    // Scopes-------------------------------------------

    public function scopeWhenAttribute($query, $attribute)
    {
        return $query->when($attribute, function ($q) use ($attribute){
            return $q->whereHas('attributes', function ($qu) use ($attribute){
                return $qu->whereIn('attribute_id', (array)$attribute);
            });
        });
    }

    // Relations
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute');
    }
}

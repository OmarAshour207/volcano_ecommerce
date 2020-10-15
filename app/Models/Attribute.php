<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name'
    ];

    // Relations
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute');
    }
}

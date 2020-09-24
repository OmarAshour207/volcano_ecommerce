<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    // Attributes
    public function getSliderImageAttribute()
    {
        return Storage::url('public/slider/' . $this->image);
    }

}

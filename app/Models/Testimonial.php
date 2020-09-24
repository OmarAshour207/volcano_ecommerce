<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'meta_tag',
        'image'
    ];

    public function getTestimonialImageAttribute()
    {
        return Storage::url('public/testimonials/' . $this->image);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $fillable = [
        'author',
        'title',
        'content',
        'meta_tag',
        'image'
    ];

    public function getBlogImageAttribute()
    {
        return Storage::url('public/blogs/' . $this->image);
    }
}

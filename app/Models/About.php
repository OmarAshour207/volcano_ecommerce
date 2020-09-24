<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public function getAboutImageAttribute()
    {
        return Storage::url('public/aboutus/' . $this->image);
    }
}

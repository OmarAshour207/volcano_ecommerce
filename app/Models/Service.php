<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'meta_tag',
        'image'
    ];

    public function getServiceImageAttribute()
    {
        return Storage::url('public/services/' . $this->image);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Offer extends Model
{
    protected $fillable = [
        'value',
        'title',
        'image'
    ];

    public function getOfferImageAttribute()
    {
        return Storage::url('public/offers/' . $this->image);
    }
}

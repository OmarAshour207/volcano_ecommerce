<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Logo extends Model
{
    protected $fillable = ['image'];

    public function getLogoImageAttribute()
    {
        return Storage::url('public/logos/' . $this->image);
    }
}

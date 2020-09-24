<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'meta_tag',
        'image'
    ];

    // Attributes
    public function getMemberImageAttribute()
    {
        return Storage::url('public/team-members/' . $this->image);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactNotification extends Model
{
    protected $fillable = [
        'name',
        'content',
        'status'
    ];

}

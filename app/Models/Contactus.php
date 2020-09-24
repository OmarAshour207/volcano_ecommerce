<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description'
    ];
}

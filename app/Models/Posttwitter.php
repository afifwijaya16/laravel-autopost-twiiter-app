<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttwitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'url_image_post',
        // 'image_post',
        // 'date_post',
        'day_post',
        'time_post',
    ];
}

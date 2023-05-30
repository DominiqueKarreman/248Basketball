<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;

class NewsArticle extends Model
{
    protected $fillable = [
        'title',
        'is_cover',
        'short_description',
        'content',
        'image',
    ];
}

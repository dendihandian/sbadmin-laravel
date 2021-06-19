<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const FILLABLE_FIELDS = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
    ];

    protected $fillable = self::FILLABLE_FIELDS;
}

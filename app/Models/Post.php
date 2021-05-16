<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const FILLABLE_FIELDS = [
        'title',
        'slug',
        'excerpt',
        'body',
    ];

    protected $fillable = self::FILLABLE_FIELDS;
}

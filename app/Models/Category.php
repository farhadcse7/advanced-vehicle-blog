<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_desc',
        'meta_keywords',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

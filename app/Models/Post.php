<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'title',
        'slug',
        'img',
        'description',
        'category_id',
        'views',
        'meta_title',
        'meta_desc',
        'meta_keywords',
    ];
    // Optional
    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

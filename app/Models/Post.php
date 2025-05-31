<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
    ];
    // Optional
    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

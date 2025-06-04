<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'name',
        'link',
        'img',
        'clicks',
    ];
   

}

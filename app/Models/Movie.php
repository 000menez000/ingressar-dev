<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'movie_id';
    protected $fillable = ['title', 'description', 'duration', 'image_url'];

    protected function categories()
    {
        return $this->belongsToMany(
            Category::class, 
            'category_movie', 
            'movie_id', 
            'category_id'
        );
    }
}

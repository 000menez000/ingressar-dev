<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $primaryKey = "category_id";
    protected $fillable = ["name", "description"];

    protected function movies()
    {
        return $this->belongsToMany(
            Movie::class, 
            'category_movie', 
            'category_id', 
            'movie_id'
        );
    }
}

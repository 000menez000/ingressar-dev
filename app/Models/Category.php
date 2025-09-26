<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $primaryKey = "category_id";
    protected $fillable = ["name", "description"];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected $hidden = ['pivot'];

    protected $appends = ["color_categories"];

    public function movies()
    {
        return $this->belongsToMany(
            Movie::class, 
            'category_movie', 
            'category_id', 
            'movie_id'
        );
    }

    public function getColorsCategoriesAttribute(): array
    {
        if ($this->categories->isEmpty()) {
            $color = [];

            switch ($this->name)
            {
                case "acao":
                    $color = [$this->name => "bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300"];
                    break;
                case "romance":
                    $color = [$this->name => "bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300"];
                    break;
                case "suspense  ":
                    $color = [$this->name => "bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300"];
                    break;
                case "drama":
                    $color = [$this->name => "bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300"];
                    break;
                case "terror":
                    $color = [$this->name => "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300"];
                    break;
                case "comedia":
                    $color = [$this->name => "bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300"];
                    break;

            }
        
            return $color;
        }

        return [];
    }
}

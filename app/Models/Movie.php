<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'movie_id';
    protected $fillable = ['title', 'description', 'duration', 'image_url'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];
    protected $with = ['categories'];
    protected $appends = [
        'formatted_duration',
        'description_snippet'
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class, 
            'category_movie', 
            'movie_id', 
            'category_id'
        );
    }

    public function getFormattedDurationAttribute(): string
    {
        $hours = floor($this->duration / 3600);
        $minutes = floor(($this->duration % 3600) / 60);
        
        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function getDescriptionSnippetAttribute(): string
    {
        return strlen($this->description) > 100
            ? substr($this->description, 0, 100) . '...'
            : $this->description;
    }
}

<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $guarded = [];

    public function getVisibilityAttribute($value)
    {
        return ucfirst($value);
    }

    public function setVisibilityAttribute($value)
    {
        $this->attributes['visibility'] = strtolower($value);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}

<?php

namespace App\Models;

use App\Traits\EntityCreateUpdateDeletingTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use SoftDeletes, EntityCreateUpdateDeletingTraits, InteractsWithMedia;

    public $table = 'posts';
    protected $guarded = ['id'];
    public $timestamps = false;

    // Register media conversions for optimization
    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('seo_image')
            ->width(1200)
            ->height(628)
            ->sharpen(10)
            ->nonQueued(); // Run immediately
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeFilter($query, $filters) {
        $query->when($filters->title ?? false, fn($query, $title) => $query->where('title', 'LIKE', "%". trim($title) . "%"));
    }
}
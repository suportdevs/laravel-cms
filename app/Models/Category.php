<?php

namespace App\Models;

use App\Traits\EntityCreateUpdateDeletingTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use SoftDeletes, EntityCreateUpdateDeletingTraits,InteractsWithMedia;

    public $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    // Register media conversions for optimization
    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('seo_image')
            ->width(1200)
            ->height(628)
            ->sharpen(10)
            ->nonQueued(); // Run immediately
    }
    // Renamed childs to children for readability
    public function children() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeFilter($query, $filters) {
        $query->when($filters->name ?? false, fn($query, $name) => $query->where('name', 'LIKE', "%". trim($name) . "%"));
    }
}

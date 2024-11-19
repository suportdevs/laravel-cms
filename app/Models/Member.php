<?php

namespace App\Models;

use App\Traits\EntityCreateUpdateDeletingTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Member extends Model implements HasMedia
{
    use SoftDeletes, EntityCreateUpdateDeletingTraits, InteractsWithMedia;

    public $table = 'members';
    protected $guarded = ['id'];
    public $timestamps = false;

    // Register media conversions for optimization
    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('image')
            ->width(300)
            ->sharpen(10)
            ->nonQueued(); // Run immediately
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeFilter($query, $filters) {
        $query->when($filters->name ?? false, fn($query, $name) => $query->where('name', 'LIKE', "%". trim($name) . "%"));
    }
}

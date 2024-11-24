<?php

namespace App\Models;

use App\Traits\EntityCreateUpdateDeletingTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use SoftDeletes, EntityCreateUpdateDeletingTraits, InteractsWithMedia;

    public $table = 'setting';
    protected $guarded = ['id'];
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'general' => 'array',
            'page' => 'array',
            'blog' => 'array'
        ];
    }
}

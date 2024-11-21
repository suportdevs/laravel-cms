<?php

namespace App\Models;

use App\Traits\EntityCreateUpdateDeletingTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, EntityCreateUpdateDeletingTraits;

    public $table = 'menus';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function scopeFilter($query, $filters) {
        $query->when($filters->name ?? false, fn($query, $name) => $query->where('name', 'LIKE', "%". trim($name) . "%"));
    }
}

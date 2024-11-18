<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait EntityCreateUpdateDeletingTraits{

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now();
            $model->created_by = Auth::id();
            $model->_key = uniqueKey();
        });

        static::updating(function ($model) {
            $model->updated_at = Carbon::now();
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model) {
            $model->deleted_at = Carbon::now();
            $model->deleted_by = Auth::id();
        });
    }
}

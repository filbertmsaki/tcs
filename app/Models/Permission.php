<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;
use Illuminate\Support\Str;

class Permission extends PermissionModel
{
    public $guarded = [];
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}

<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;
use Illuminate\Support\Str;

class Role extends RoleModel
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

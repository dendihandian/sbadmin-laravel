<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class Permission extends SpatiePermissionModel
{
    use HasFactory;

    const FILLABLE_FIELDS = ['name', 'display_name', 'description', 'guard_name'];

    protected $fillable = self::FILLABLE_FIELDS;
}

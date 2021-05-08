<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel
{
    use HasFactory;

    const NAME_ADMINISTRATOR = 'administrator';
    const FILLABLE_FIELDS = ['name', 'display_name', 'description', 'guard_name'];

    protected $fillable = self::FILLABLE_FIELDS;
}

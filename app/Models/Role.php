<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel
{
    use HasFactory;

    const NAME_ADMINISTRATOR = 'administrator';

    protected $fillable = ['name', 'display_name', 'description', 'guard_name'];
}

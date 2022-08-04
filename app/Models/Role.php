<?php

namespace App\Models;

use App\Helpers\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
class Role extends SpatieRole
{
    //use HasFactory;
    use UsesUUID;
    const ADMIN = "admin";

    //protected $table = 'roles';
    protected $fillable=[
        'name',
        'guard_name'
    ];
}

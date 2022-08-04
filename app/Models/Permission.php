<?php

namespace App\Models;

use App\Helpers\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    //use HasFactory;
    use UsesUUID;

}

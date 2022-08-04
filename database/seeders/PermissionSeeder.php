<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect([
            //user permission
            'list-user',
            'update-user',
            'delete-user',
            'create-user',

            'list-issue',
            'update-issue',
            'delete-issue',
            'create-issue',

            'list-solution',
            'update-solution',
            'delete-solution',
            'create-solution',

            'list-role',
            'update-role',
            'delete-role',
            'create-role',

            'list-permission',
            'update-permission',
            'delete-permission',
            'create-permission',

        ])->map(fn ($permission) => Permission::create(['name' => $permission]))
            ->map(fn ($permission) => $permission->name);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => Role::ADMIN]);

        $permissions = Permission::all();

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'telephone' => '1234567890',
            'password' => 'password',
        ]);

        $role->syncPermissions($permissions);

        $user->assignRole([$role->name]);
    }
}

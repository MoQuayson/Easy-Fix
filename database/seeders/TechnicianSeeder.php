<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => Role::TECHNICIAN]);

        $permissions = [
            'list-issue',
            'update-issue',
            'delete-issue',
            'create-issue',

            'list-solution',
            'update-solution',
            'delete-solution',
            'create-solution',

        ];

        $role->syncPermissions($permissions);
    }
}

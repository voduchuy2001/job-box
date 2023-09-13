<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'dashboard',
            'media-file',
            'role-permission',
            'permission-edit',
            'role-create',
            'role-update',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'job-list',
            'job-create',
            'job-edit',
            'job-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}

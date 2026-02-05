<?php

namespace Shop\Admin\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //user
            'user-index',
            'user-create',
            'user-store',
            'user-edit',
            'user-update',
            'user-delete',

            // role
            'role-index',
            'role-create',
            'role-store',
            'role-edit',
            'role-update',
            'role-delete',

            // permission
            'permission-index',
            'permission-create',
            'permission-store',
            'permission-edit',
            'permission-update',
            'permission-delete',

        ];

        foreach ($permissions as $item) {
            $permission = Permission::where('name', $item)->first();
            if ($permission) {
                $permission->update([
                    'name' => $item,
                    'guard_name'=>'admin'
                ]);
            } else {
                Permission::create([
                    'name' => $item,
                    'guard_name'=>'admin'
                ]);
            }
        }
    }
}

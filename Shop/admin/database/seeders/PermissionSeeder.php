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
            // dashboard
            'dashboard-index',


            //product
            'product-index',
            'product-create',
            'product-store',
            'product-edit',
            'product-update',
            'product-delete',

            // category
            'category-index',
            'category-create',
            'category-store',
            'category-edit',
            'category-update',
            'category-delete',

            // brand
            'brand-index',
            'brand-create',
            'brand-store',
            'brand-edit',
            'brand-update',
            'brand-delete',


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

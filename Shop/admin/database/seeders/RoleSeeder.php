<?php

namespace Shop\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Shop\Admin\Models\Admin;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Super Admin',
            'guard_name'=>'admin'
            ]);

        $admin = Admin::where('email','iftekhermahmud1@gmail.com')->first();

        $admin->assignRole($role->name);

        // Role::create([
        //     'name' => 'Admin',
        //     'guard_name'=>'admin'
        //     ]);

        //     Role::create([
        //     'name' => 'Editor',
        //     'guard_name'=>'admin'
        //     ]);

        //     Role::create([
        //     'name' => 'Manager',
        //     'guard_name'=>'admin'
        //     ]);

    }
}

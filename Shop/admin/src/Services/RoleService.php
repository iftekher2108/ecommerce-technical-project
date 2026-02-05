<?php

namespace Shop\Admin\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public $redirect = 'admin.role.index';
    public function roleAll($request)
    {
        $query = Role::query();
        if ($request->has('search')) {
            $query->where('name', "%{$request->input('search')}%");
        }
        $roles = $query->whereNot('name', 'Super Admin')->with('permissions:name')->paginate(15);
        return ['roles' => $roles];
    }

    public function roleStore($request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        $role->givePermissionTo($request->permissions);
    }

    
    public function roleById($id)
    {
        $role = Role::findById($id);
        return ['role' => $role];
    }

    public function roleUpdate($request, $id)
    {
        $role = Role::findById($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions($request->permissions);
    }

    public function roleDelete($id) {}
}

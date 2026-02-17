<?php

namespace Shop\User\Services;

use Spatie\Permission\Models\Role;

class UserRoleService
{
    public $redirect = 'admin.user-role.index';
    public function userRoleAll($request)
    {
        $query = Role::query();
        $query->where('guard_name', 'web');
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $roles = $query->with('permissions:name')->paginate(15);
        return ['roles' => $roles, 'search' => $search];
    }

    public function getUserRoles()
    {
        return Role::where('guard_name', 'web')->get(['id', 'name']);
    }
    public function userRoleStore($request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        $role->givePermissionTo($request->permissions);
    }


    public function userRoleById($id)
    {
        $role = Role::findById($id);
        return ['role' => $role];
    }

    public function userRoleUpdate($request, $id)
    {
        $role = Role::findById($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($request->permissions);
    }

    public function userRoleDelete($id)
    {
        $role = Role::findById($id);
        $role->delete();
    }
}

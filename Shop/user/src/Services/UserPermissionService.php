<?php

namespace Shop\User\Services;

use Spatie\Permission\Models\Permission;

class UserPermissionService
{
    public $redirect = 'admin.user-permission.index';
    public function userPermissionAll($request)
    {
        $query = Permission::query();
        $query->where('guard_name', 'web');
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $permissions = $query->paginate(15);
        return ['permissions' => $permissions, 'search' => $search];
    }


    public function userPermissionStore($request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
    }

    public function userPermissionById($id)
    {
        return ['permission' => Permission::findById($id)];
    }

    public function userPermissionUpdate($request, $id)
    {
        $permission = Permission::findById($id);
        $permission->update([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
    }

    public function userPermissionDelete($id)
    {
        $permission = Permission::findById($id);
        $permission->delete();
    }

    public function userPermissions()
    {
        $permissions = Permission::where('guard_name', 'web')->get(['id', 'name']);
        return $permissions;
    }
}

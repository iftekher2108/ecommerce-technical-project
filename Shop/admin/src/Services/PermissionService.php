<?php

namespace Shop\Admin\Services;

use Spatie\Permission\Models\Permission;

class PermissionService
{
    public $redirect = 'admin.permission.index';
    public function permissionAll($request)
    {
        $query = Permission::query();
        if ($request->has('search')) {
            $query->where('name', "%{$request->input('search')}%");
        }
        $permissions = $query->paginate(15);
        return ['permissions' => $permissions];
    }

   
    public function permissionStore($request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
    }

    public function permissionById($id) {
        return ['permission' => Permission::findById($id)];
    }

    public function permissionUpdate($request, $id) {
        $permission = Permission::findById($id);
           $permission->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
    }

    public function permissionDelete($id) {
        $permission = Permission::findById($id);
        $permission->delete();
    }
    
     public function permissions() {
        $permissions = Permission::get(['id','name']);
        return $permissions;
    }
}

<?php

namespace Shop\Admin\Services;

use Spatie\Permission\Models\Role;

class RoleService {
    public $redirect = 'admin.role.index';
    public function roleAll($request) {
        $query = Role::query();
        if($request->has('search')) {
            $query->where('name',"%{$request->input('search')}%");
        }
        $roles = $query->with('permissions')->paginate(15);
        return ['roles' => $roles] ;
    }

    public function roleStore($request) {
        Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
    }

    public function roleDelete($id) {
        
    }

}
<?php

namespace Shop\Admin\Services;

use Shop\Admin\Models\Admin;
use Spatie\Permission\Models\Role;

class AdminService
{
    public $redirect = 'admin.user.index';

    public function adminAll($request)
    {
        $query = Admin::query();
        $query->whereNot('username', 'iftekhermahmud1');
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $admins = $query->with('roles')->paginate(15);
        return ['admins' => $admins, 'search' => $search];
    }

    public function adminCreate() {
        $roles = Role::whereNot('name','Super Admin')->get(['id','name']);
        return ['roles' => $roles];
    }

    public function adminStore($request) {}

    public function adminById($id) {}

    public function adminUpdate($id) {}

    public function adminDelete($id) {
        $admin = Admin::findById($id);
        $admin->delete();
    }
}

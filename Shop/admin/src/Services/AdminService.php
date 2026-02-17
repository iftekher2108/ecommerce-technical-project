<?php

namespace Shop\Admin\Services;

use Shop\Admin\Classes\Helper;
use Shop\Admin\Models\Admin;
use Spatie\Permission\Models\Role;

class AdminService
{
    public $redirect = 'admin.admin.index';

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

    public function adminCreate()
    {
        $roles = Role::whereNot('name', 'Super Admin')->get(['id', 'name']);
        return ['roles' => $roles];
    }

    public function adminStore($request)
    {
        $picture = null;
        if (isset($request->picture)) {
            $picture = Helper::fileUpload('admin', 'admin', $request->picture);
        }
        $admin = Admin::create([
            'picture' => $picture,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $admin->assignRole($request->role);
    }

    public function adminById($id)
    {
        return ['admin' => Admin::findOrFail($id)];
    }

    public function adminUpdate($request, $id)
    {
        $admin = Admin::findOrFail($id);
        $picture = $admin->picture;
        if (isset($request->picture)) {
            Helper::fileDelete($admin->picture);
            $picture = Helper::fileUpload('admin', 'admin', $request->picture);
        }
        $admin->update([
            'picture' => $picture,
            'name' => $request->name,
            // 'username' => $request->username,
            // 'email' => $request->email,
            // 'password' => $request->password,
        ]);
        $admin->syncRoles($request->role);
    }

    public function adminDelete($id)
    {
        $admin = Admin::findById($id);
        $admin->delete();
    }
}

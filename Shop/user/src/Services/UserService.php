<?php

namespace Shop\User\Services;

use Shop\Admin\Classes\Helper;
use Shop\User\Models\User;
use Spatie\Permission\Models\Role;


class UserService
{
    public $redirect = 'admin.user.index';

    public function userAll($request)
    {
        $query = User::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $users = $query->with('roles')->paginate(15);
        return ['users' => $users, 'search' => $search];
    }

    public function userCreate()
    {
        $roles = Role::where('guard_name','web')->get(['id', 'name']);
        return ['roles' => $roles];
    }

    public function userStore($request)
    {
        $picture = null;
        if (isset($request->picture)) {
            $picture = Helper::fileUpload('user', 'user', $request->picture);
        }
        $user = User::create([
            'picture' => $picture,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user->assignRole($request->role);
    }

    public function userById($id)
    {
        return ['admin' => User::findOrFail($id)];
    }

    public function userUpdate($request, $id)
    {
        $user = User::findOrFail($id);
        $picture = $user->picture;
        if (isset($request->picture)) {
            Helper::fileDelete($user->picture);
            $picture = Helper::fileUpload('user', 'user', $request->picture);
        }
        $user->update([
            'picture' => $picture,
            'name' => $request->name,
            // 'username' => $request->username,
            // 'email' => $request->email,
            // 'password' => $request->password,
        ]);
        $user->syncRoles($request->role);
    }

    public function userDelete($id)
    {
        $user = User::findById($id);
        $user->delete();
    }
}

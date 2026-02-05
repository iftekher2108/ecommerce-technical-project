<?php

namespace Shop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Admin\Services\PermissionService;
use Shop\Admin\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService, protected PermissionService $permissionService) {}
    public function index(Request $request)
    {
        $data = $this->roleService->roleAll($request);
        return view('admin::role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['permissions'] = $this->permissionService->permissions();
        return view('admin::role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);
        $this->roleService->roleStore($request);
        return to_route($this->roleService->redirect)->with('success', 'Role Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->roleService->roleById($id);
        $data['permissions'] = $this->permissionService->permissions();
        return view('admin::role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);
        $this->roleService->roleUpdate($request, $id);
        return to_route($this->roleService->redirect)->with('success', 'Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}

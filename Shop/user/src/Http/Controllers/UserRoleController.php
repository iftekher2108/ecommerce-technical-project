<?php

namespace Shop\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\User\Services\UserPermissionService;
use Shop\User\Services\UserRoleService;

class UserRoleController extends Controller
{
    public function __construct(protected UserRoleService $userRoleService, protected UserPermissionService $userPermissionService) {}
    public function index(Request $request)
    {
        $data = $this->userRoleService->userRoleAll($request);
        return view('user::role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['permissions'] = $this->userPermissionService->userPermissions();
        return view('user::role.create', $data);
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
        $this->userRoleService->userRoleStore($request);
        return to_route($this->userRoleService->redirect)->with('success', 'Role Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->userRoleService->userRoleById($id);
        $data['permissions'] = $this->userPermissionService->userPermissions();
        return view('user::role.edit', $data);
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
        $this->userRoleService->userRoleUpdate($request, $id);
        return to_route($this->userRoleService->redirect)->with('success', 'Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userRoleService->userRoleDelete($id);
        return to_route($this->userRoleService->redirect)->with('success', 'Role Delete Successfully');
    }
}

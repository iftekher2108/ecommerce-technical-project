<?php

namespace Shop\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\User\Services\UserPermissionService;

class UserPermissionController extends Controller
{
    public function __construct(protected UserPermissionService $userPermissioService)
    {
    }
    public function index(Request $request)
    {
        $data = $this->userPermissioService->userPermissionAll($request);
        return view('user::permission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->userPermissioService->userPermissionStore($request);
        return to_route($this->userPermissioService->redirect)->with('success','Permission Create Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->userPermissioService->userPermissionById($id);
        return view('user::permission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->userPermissioService->userPermissionUpdate($request, $id);
        return to_route($this->userPermissioService->redirect)->with('success','Permission Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userPermissioService->userPermissionDelete($id);
        return to_route($this->userPermissioService->redirect)->with('success','Permission Delete Successfully');
    }
}

<?php

namespace Shop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Admin\Services\PermissionService;

class PermissionController extends Controller
{
    public function __construct(protected PermissionService $permissioService)
    {
    }
    public function index(Request $request)
    {
        $data = $this->permissioService->permissionAll($request);
        return view('admin::permission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->permissioService->permissionStore($request);
        return to_route($this->permissioService->redirect)->with('success','Permission Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->permissioService->permissionById($id);
        return view('admin::permission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->permissioService->permissionUpdate($request, $id);
        return to_route($this->permissioService->redirect)->with('success','Permission Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->permissioService->permissionDelete($id);
        return to_route($this->permissioService->redirect)->with('success','Permission Delete Successfully');
    }
}

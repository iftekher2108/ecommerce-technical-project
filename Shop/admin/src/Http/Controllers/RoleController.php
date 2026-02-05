<?php

namespace Shop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Admin\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService)
    {
    }
    public function index(Request $request)
    {
        $data = $this->roleService->roleAll($request);
        return view('admin::role.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->roleService->roleStore($request);
        return to_route($this->roleService->redirect)->with('success','Role Create Successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
    }
}

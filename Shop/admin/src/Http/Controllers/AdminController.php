<?php

namespace Shop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Admin\Models\Admin;
use Shop\Admin\Services\AdminService;
use Shop\Admin\Services\RoleService;

class AdminController extends Controller
{
    public function __construct(protected AdminService $adminService, protected RoleService $roleService) {}
    public function dashboard()
    {
        return view('admin::dashboard');
    }


    public function index(Request $request)
    {
        $data = $this->adminService->adminAll($request);
        return view('admin::user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->adminService->adminCreate();
        return view('admin::user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|max:2048|mimes:png,jpg',
            'name' => 'required|string',
            'username' => 'required',
            'email' => 'email|required',
            'roles' => 'nullable',
            'password' => 'required|min:8',
        ]);
        // dd($request->all());
        $this->adminService->adminStore($request);
        return to_route($this->adminService->redirect)->with('success', 'User Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->adminService->adminById($id);
        $data['roles'] = $this->roleService->getRoles();
        return view('admin::user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture' => 'nullable|max:2048|mimes:png,jpg',
            'name' => 'required|string',
            // 'username' => 'required',
            // 'email' => 'email|required',
            'roles' => 'nullable',
            // 'password' => 'required|min:8',
        ]);
        $this->adminService->adminUpdate($request, $id);
        return to_route($this->adminService->redirect)->with('success', 'User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = Admin::findById($id);
        $admin->delete();
        return to_route($this->adminService->redirect)->with('success', 'Admin Delete Successfully');
    }
}

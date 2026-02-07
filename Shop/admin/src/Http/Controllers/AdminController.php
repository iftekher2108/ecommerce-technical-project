<?php

namespace Shop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Admin\Models\Admin;
use Shop\Admin\Services\AdminService;

class AdminController extends Controller
{
    public function __construct(protected AdminService $adminService)
    {
    }
    public function dashboard()
    {
        return view('admin::dashboard');
    }


    public function index(Request $request) {
        $data = $this->adminService->adminAll($request);
        return view('admin::user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->adminService->adminCreate();
        return view('admin::user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->adminService->adminStore($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->adminService->adminById($id);
        return view('admin::user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

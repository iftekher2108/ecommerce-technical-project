<?php

namespace Shop\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\User\Services\UserRoleService;
use Shop\User\Services\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $userService, protected UserRoleService $userRoleService) {}

    public function index(Request $request)
    {
        $data = $this->userService->userAll($request);
        return view('user::user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->userService->userCreate();
        return view('user::user.create',$data);
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
        $this->userService->userStore($request);
        return to_route($this->userService->redirect)->with('success', 'User Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->userService->userById($id);
        $data['roles'] = $this->userRoleService->getUserRoles();
        return view('admin::admin.edit', $data);
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
        $this->userService->userUpdate($request, $id);
        return to_route($this->userService->redirect)->with('success', 'User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userService->userDelete($id);
        return to_route($this->userService->redirect)->with('success', 'User Delete Successfully');
    }
}

<?php

namespace Shop\Store\Http\Controllers;

use Illuminate\Http\Request;
use Shop\Store\Services\UserProfileService;

class UserProfileController
{
    public function __construct(protected UserProfileService $userProfileService)
    {
    }
    public function userProfile()
    {
        return view('store::user.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request) {
        $data = $this->userProfileService->logout($request);
        return $data;
    }

}

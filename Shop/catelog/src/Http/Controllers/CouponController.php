<?php

namespace Shop\Catelog\Http\Controllers;

use Illuminate\Http\Request;
use Shop\Catelog\Models\Coupon;
use Shop\Catelog\Services\CouponService;

class CouponController
{
    public function __construct(protected CouponService $couponService)
    {
    }
    public function index(Request $request)
    {
        $data = $this->couponService->couponAll($request);
        return view('catelog::coupon.index',$data);
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
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}

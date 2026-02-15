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
        return view('catelog::coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'code'       => ['required', 'string', 'max:255', 'unique:coupons,code'],
            'discount'   => ['required', 'integer', 'min:1'],
            'date_start' => ['required', 'date'],
            'date_end'   => ['required', 'date', 'after_or_equal:date_start'],
            'used_total' => ['nullable', 'integer', 'min:0'],
        ]);
        $this->couponService->couponStore($request);
        return to_route($this->couponService->redirect)->with('success', 'Coupon Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->couponService->couponById($id);
        return view('catelog::coupon.edit',['coupon' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->couponService->couponUpdate($request, $id);
        return to_route($this->couponService->redirect)->with('success', 'Coupon Update Successfully');
    }

    public function status($id) {
        $this->couponService->couponStatus($id);
        return to_route($this->couponService->redirect)->with('success', 'Coupon Status Change Successfully');
    }
    
    public function destroy($id)
    {
        $this->couponService->couponDelete($id);
        return to_route($this->couponService->redirect)->with('success', 'Coupon Delete Successfully');
    }
}

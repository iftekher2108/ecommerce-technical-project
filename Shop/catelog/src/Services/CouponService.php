<?php

namespace Shop\Catelog\Services;

use Shop\Catelog\Models\Coupon;

class CouponService
{
    public $redirect = 'admin.coupon.index';

    public function couponAll($request)
    {
        $query = Coupon::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('code', 'like', "%{$search}%");
        }
        $coupons = $query->paginate(15);
        return ['coupons' => $coupons, 'search' => $search];
    }

    public function couponStore($request)
    {
        Coupon::create([
            'name'          => $request->name,
            'code'          => $request->code,
            'discount'      => $request->discount,
            'dis_type'      => $request->dis_type,
            'minimum_price' => $request->minimum_price,
            'date_start'    => $request->date_start,
            'date_end'      => $request->date_end,
            'status'        => $request->status
        ]);
    }

    public function couponById($id)
    {
        $coupon = Coupon::findOrFail($id);
        return $coupon;
    }

    public function couponUpdate($request, $id) {
        $coupon = Coupon::findOrFail($id);
         $coupon->update([
            'name'          => $request->name,
            'code'          => $request->code,
            'discount'      => $request->discount,
            'dis_type'      => $request->dis_type,
            'minimum_price' => $request->minimum_price,
            'date_start'    => $request->date_start,
            'date_end'      => $request->date_end,
            'status'        => $request->status
        ]);
    }

    public function couponStatus($id) {
        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'status' => $coupon->status ^ 1
        ]);
    }

    public function couponDelete($id) {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
    }
}

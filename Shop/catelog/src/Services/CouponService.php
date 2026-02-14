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
            $query->where('name', 'like', "%$search%");
        }
        $coupons = $query->paginate(15);
        return ['coupons' => $coupons, 'search' => $search];
    }
}

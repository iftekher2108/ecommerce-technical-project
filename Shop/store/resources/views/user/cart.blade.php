@extends('store::layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-shopping-cart me-2"></i> Shopping Cart</h5>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle me-2"></i>
                        Items added to your cart will appear here.
                    </div>
                    
                    <div class="text-center py-5">
                        <p class="text-muted mb-3">Your cart is empty</p>
                        <div class="d-flex justify-content-center" style="gap: 8px;">
                            <a href="{{ route('home.index') }}" class="btn btn-primary rounded-pill">
                                <i class="fa fa-shopping-bag me-2"></i> Continue Shopping
                            </a>
                            <a href="{{ route('profile.checkout') }}" class="btn btn-outline-primary rounded-pill">
                                <i class="fa fa-credit-card me-2"></i> Go to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

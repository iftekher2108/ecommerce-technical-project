@extends('store::layouts.app')

@section('title', 'My Wishlist')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-danger text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-heart me-2"></i>My Wishlist</h5>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle me-2"></i>
                        Your wishlist items will appear here. Add items from the shop to save them for later.
                    </div>
                    
                    <div class="text-center py-5">
                        <p class="text-muted mb-3">No items in your wishlist yet</p>
                        <a href="{{ route('home.index') }}" class="btn btn-danger rounded-pill">
                            <i class="fa fa-shopping-bag me-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

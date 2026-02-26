@extends('store::layouts.app')

@section('title', 'User Profile')

@section('meta_description', 'Manage your account, wishlist, cart, and order history')

@push('style')
    <style>
        .profile-card {
            border: 1px solid #f0f0f0;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(221, 34, 34, 0.1) !important;
        }

        .hover-effect {
            cursor: pointer;
        }

        .card-body i {
            transition: all 0.3s ease;
        }

        .profile-card:hover i {
            transform: scale(1.1);
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- User Profile Header -->
            <div class="col-lg-12 mb-4">
                <div class="card border-0 shadow-sm rounded-3"
                    style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--title-color) 100%);">
                    <div class="card-body text-white p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="mb-2" style="font-weight: 600;">Welcome back, {{ Auth::user()->name }}!</h2>
                                <p class="mb-0" style="font-size: 14px; opacity: 0.9;">Email: {{ Auth::user()->email }}
                                </p>
                                <p style="font-size: 14px; opacity: 0.9;">Member Since:
                                    {{ Auth::user()->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="col-md-4 d-flex gap-2 justify-content-end">
                                <div>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary rounded-pill">
                                        <i class="fa fa-edit me-2"></i> Edit Profile
                                    </a>
                                    <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary rounded-pill">
                                            <i class="fa fa-sign-out me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Cards -->
        <div class="row g-3 mb-5">
            <!-- Wishlist Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 text-center h-100 profile-card hover-effect"
                    style="transition: all 0.3s ease;">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fa fa-heart fa-3x" style="color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title mb-2">Wishlist</h5>
                        <p class="card-text text-muted small mb-3">View and manage your favorite items</p>
                        <a href="{{ route('profile.wishlist') }}" class="btn btn-outline-primary rounded-pill">
                            View Wishlist <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Shopping Cart Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 text-center h-100 profile-card hover-effect"
                    style="transition: all 0.3s ease;">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fa fa-shopping-cart fa-3x" style="color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title mb-2">Shopping Cart</h5>
                        <p class="card-text text-muted small mb-3">Review and update your cart items</p>
                        <a href="{{ route('profile.cart') }}" class="btn btn-outline-primary rounded-pill">
                            View Cart <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Checkout Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 text-center h-100 profile-card hover-effect"
                    style="transition: all 0.3s ease;">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fa fa-credit-card fa-3x" style="color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title mb-2">Checkout</h5>
                        <p class="card-text text-muted small mb-3">Proceed to complete your purchase</p>
                        <a href="{{ route('profile.checkout') }}" class="btn btn-outline-primary rounded-pill">
                            Go to Checkout <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order History Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 text-center h-100 profile-card hover-effect"
                    style="transition: all 0.3s ease;">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fa fa-history fa-3x" style="color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title mb-2">Order History</h5>
                        <p class="card-text text-muted small mb-3">Track and view your previous orders</p>
                        <a href="{{ route('profile.orders') }}" class="btn btn-outline-primary rounded-pill">
                            View Orders <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Account Options -->
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-light border-bottom-0 rounded-top-3">
                        <h6 class="mb-0" style="color: var(--primary-color); font-weight: 600;">
                            <i class="fa fa-map-marker me-2"></i> Saved Addresses
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small mb-2">Manage your delivery addresses</p>
                        <a href="{{ route('profile.addresses') }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fa fa-plus me-2"></i> Manage Addresses
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-light border-bottom-0 rounded-top-3">
                        <h6 class="mb-0" style="color: var(--primary-color); font-weight: 600;">
                            <i class="fa fa-lock me-2"></i> Account Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small mb-2">Update password and security settings</p>
                        <a href="{{ route('profile.settings') }}" class="btn btn-outline-primary rounded-pill">
                            <i class="fa fa-gear me-2"></i> Go to Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection

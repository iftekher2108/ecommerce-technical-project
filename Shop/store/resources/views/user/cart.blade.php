@extends('store::layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    @php
        $subtotal = 0;
        $currency = $setting['ecommerce.currency'] ?? '$';
    @endphp

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.index') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($carts->count() > 0)
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                        @php
                                            $product = $cart->product;
                                            $price = $product->sale_price && $product->sale_price < $product->price ? $product->sale_price : $product->price;
                                            $total = $price * $cart->quantity;
                                            $subtotal += $total;
                                        @endphp
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $product->picture ? asset('storage/' . $product->picture) : asset('frontend/img/product/details/product-details-1.jpg') }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                                                <h5><a href="{{ route('home.product', $product->slug) }}">{{ $product->name }}</a></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $currency }}{{ number_format($price, 2) }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" name="quantity" value="{{ $cart->quantity }}">
                                                        </div>
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-2">Update</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ $currency }}{{ number_format($total, 2) }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this item?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted mb-3">Your cart is empty</h4>
                            <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
                            <a href="{{ route('home.shop') }}" class="btn btn-primary btn-lg rounded-pill">
                                <i class="fa fa-shopping-bag me-2"></i> Continue Shopping
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            @if($carts->count() > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ route('home.shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>{{ $currency }}{{ number_format($subtotal, 2) }}</span></li>
                                <li>Total <span>{{ $currency }}{{ number_format($subtotal, 2) }}</span></li>
                            </ul>
                            <a href="{{ route('profile.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

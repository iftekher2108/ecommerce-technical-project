@extends('store::layouts.app')

@section('title', $product->meta_title ?: $product->name)
@section('meta_description', $product->meta_description ?: $setting['seo.meta_description'])
@section('meta_keywords', $product->meta_keywords ?: $setting['seo.meta_keywords'])
@section('meta_image', $product->picture ? asset('storage/' . $product->picture) : asset('storage/' . $setting['seo.og_image']))

@section('content')
    @php
        $mainImage = $product->picture ?: ($product->images[0] ?? null);
        $galleryImages = collect($product->images ?? [])->filter()->all();
        $breadcrumbBg = $product->banner ? asset('storage/' . $product->banner) : asset('frontend/img/breadcrumb.jpg');
    @endphp

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ $breadcrumbBg }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $product->name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.index') }}">Home</a>
                            <a href="{{ route('home.shop') }}">Shop</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ $mainImage ? asset('storage/' . $mainImage) : asset('frontend/img/product/details/product-details-1.jpg') }}"
                                alt="{{ $product->name }}">
                        </div>
                        @if (count($galleryImages))
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($galleryImages as $image)
                                    <img data-imgbigurl="{{ asset('storage/' . $image) }}"
                                        src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star{{ $i <= 4 ? '' : '-o' }}"></i>
                            @endfor
                            {{-- <span>({{ $product->stock ?? 0 }} reviews)</span> --}}
                        </div>
                        <div class="product__details__price">
                            @if ($product->sale_price && $product->sale_price < $product->price)
                            <del>{{ number_format($product->price, 2) }}{{ $setting['ecommerce.currency_symbol'] }}</del>
                                {{ number_format($product->sale_price, 2) }}{{ $setting['ecommerce.currency_symbol'] }}
                            @else
                                {{ number_format($product->price, 2) }}{{ $setting['ecommerce.currency_symbol'] }}
                            @endif
                        </div>
                        <p>{!! nl2br(e($product->short_description ?? $product->description ?? 'No description available.')) !!}</p>

                        <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-start flex-column flex-sm-row gap-2">
                            @csrf
                            <div class="pro-qty">
                                <input type="text" name="quantity" value="1">
                            </div>

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            @auth
                                <button type="submit" class="primary-btn">Add to cart</button>
                            @else
                                <a href="{{ route('home.login') }}" class="primary-btn">Login to buy</a>
                            @endauth

                            <a href="{{ route('profile.wishlist') }}" class="heart-icon">
                                <i class="fa fa-heart"></i>
                            </a>
                        </form>

                        <ul>
                            <li><b>SKU</b> {{ $product->sku }}</li>
                            <li><b>Brand</b> {{ $product->brand?->name ?? 'N/A' }}</li>
                            <li><b>Categories</b> {{ $product->categories->pluck('name')->join(', ') }}</li>
                            <li><b>Stock</b> {!! $product->in_stock ? '<span class="text-success">In stock</span>' : '<span class="text-danger">Out of stock</span>' !!}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Product Description</h5>
                        </div>
                        <div class="card-body">
                            {!! $product->description ?? '<p class="text-muted">No description available.</p>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
@extends('store::layouts.app')

@section('content')
    <!-- Hero Section Begin -->

    <section class="hero">
        <div class="container mt-2">
            <div class="hero-slider">

                @foreach ($sliders as $slider)
                    <div class="hero__item set-bg" data-setbg="{{ asset('storage/' . $slider->picture) }}">
                        <div class="hero__text">
                            {{-- <span>FRUIT FRESH</span> --}}
                            @if ($slider->title)
                                <h2>{!! $slider->title !!}</h2>
                            @endif
                            @if ($slider->sub_title)
                                <p>{!! $slider->sub_title !!}</p>
                            @endif
                            <a href="{{ route('home.shop') }}" class="btn primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                @endforeach

                {{-- 
                <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner.jpg') }}">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="{{ route('home.shop') }}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('storage/' . $category->icon) }}">
                                <h5><a href="#">{{ $category->name }}</a></h5>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Products</h2>
                    </div>
                    {{-- <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($latestProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/' . $product->picture) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('home.product', $product->slug) }}"><i class="fa fa-heart"></i></a>
                                    </li>
                                    {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                    @if (!$product->stock <= 0)
                                        <li><form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            {{-- <button type="submit"></button> --}}
                                            <button type="submit" ><i class="fa fa-shopping-cart"></i></button>
                                        </form></li>
                                        
                                    @endif
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('home.product', $product->slug) }}">{{ $product->name }}</a></h6>
                                @if ($product->stock <= 0)
                                    <span class="badge badge-danger p-2">Out of Stock</span>
                                @else
                                    
                                    <h5><del>{{ $product->price }}</del> {{ $product->sale_price }}
                                        {{ $setting['ecommerce.currency_symbol'] }}</h5>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- product Section End -->


    <!-- Product Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Products</h2>
                    </div>
                    {{-- <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/' . $product->picture) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('home.product', $product->slug) }}"><i
                                                class="fa fa-heart"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                    @if (!$product->stock <= 0)
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('home.product', $product->slug) }}">{{ $product->name }}</a></h6>
                                @if ($product->stock <= 0)
                                    <span class="badge badge-danger p-2">Out of Stock</span>
                                @else
                                    <h5><del>{{ $product->price }}</del> {{ $product->sale_price }}
                                        {{ $setting['ecommerce.currency_symbol'] }}</h5>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- product Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.hero-slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });
    </script>
@endpush

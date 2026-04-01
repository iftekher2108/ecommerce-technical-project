@extends('store::layouts.app')

@section('title', 'My Wishlist')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white rounded-top-3">
                        <h5 class="mb-0"><i class="fa fa-heart me-2"></i> My Wishlist</h5>
                    </div>
                    <div class="card-body p-4">
                        @forelse ($wishlists as $wishlist)
                            <div class="row mb-4 pb-4 border-bottom">
                                <div class="col-md-2">
                                    <img src="{{ asset('storage/' . $wishlist->product->picture) }}"
                                        alt="{{ $wishlist->product->name }}" class="img-fluid rounded">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-2">{{ $wishlist->product->name }}</h5>
                                    <p class="text-muted small mb-2">{{ Str::limit($wishlist->product->description, 100) }}
                                    </p>
                                    <p class=" mb-0"><strong>৳ {{ $wishlist->product->price }}</strong></p>
                                </div>
                                <div class="d-flex col-md-4 text-end" style="gap: 5px;">
                                    <div>
                                        <a href="{{ route('home.product', $wishlist->product->slug) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                    </div>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                        <button class="btn btn-sm btn-success me-2">
                                            <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                                        </button>
                                    </form>
                                    <form action="{{ route('wishlist.remove') }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Remove this item?')">
                                            <i class="fa fa-trash me-1"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="fa fa-heart-o fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-4">No items in your wishlist yet</p>
                                <a href="{{ route('home.index') }}" class="btn btn-primary btn-lg rounded-pill">
                                    <i class="fa fa-shopping-bag me-2"></i> Continue Shopping
                                </a>
                            </div>
                        @endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

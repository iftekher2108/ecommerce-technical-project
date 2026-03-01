@extends('store::layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-credit-card me-2"></i> Checkout</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf

                        <h6 class="mb-3" style="color: var(--primary-color); font-weight: 600;">Delivery Address</h6>
                        <div class="mb-3">
                            <label for="address_id" class="form-label">Select Address</label>
                            <select class="form-control @error('address_id') is-invalid @enderror" 
                                    id="address_id" name="address_id" required>
                                <option value="">-- Select Address --</option>
                            </select>
                            @error('address_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <h6 class="mb-3" style="color: var(--primary-color); font-weight: 600;">Payment Method</h6>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">
                                    <i class="fa fa-money me-2"></i> Cash on Delivery
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="card" value="card">
                                <label class="form-check-label" for="card">
                                    <i class="fa fa-credit-card me-2"></i> Credit/Debit Card
                                </label>
                            </div>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary rounded-pill w-100">
                            <i class="fa fa-arrow-right me-2"></i> Complete Order
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light rounded-top-3">
                    <h6 class="mb-0" style="color: var(--primary-color); font-weight: 600;">Order Summary</h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>0.00 {{ $setting['ecommerce.currency_symbol'] }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span>0.00 {{ $setting['ecommerce.currency_symbol'] }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax:</span>
                        <span>0.00 {{ $setting['ecommerce.currency_symbol'] }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between" style="font-weight: 600; color: var(--primary-color);">
                        <span>Total:</span>
                        <span>0.00 {{ $setting['ecommerce.currency_symbol'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('store::layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('profile.orders') }}" class="btn btn-outline-primary rounded-pill mb-3">
                <i class="fa fa-arrow-left me-2"></i> Back to Orders
            </a>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-file-text me-2"></i> Order Details</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color); font-weight: 600;">Order Information</h6>
                            <p class="mb-1"><strong>Order ID:</strong> #0000</p>
                            <p class="mb-1"><strong>Date:</strong> N/A</p>
                            <p class="mb-1"><strong>Status:</strong> <span class="badge bg-warning"> Pending</span></p>
                        </div>
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color); font-weight: 600;">Shipping Address</h6>
                            <p class="mb-0">Address not available</p>
                        </div>
                    </div>

                    <hr>

                    <h6 style="color: var(--primary-color); font-weight: 600; margin-bottom: 15px;"> Order Items</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead style="background-color: #f9f9f9;">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">No items in this order</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping:</span>
                                <span>$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax:</span>
                                <span>$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-weight: 600; color: var(--primary-color); font-size: 16px;">
                                <span>Total:</span>
                                <span>$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

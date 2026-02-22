@extends('store::layouts.app')

@section('title', 'Order History')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-danger text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-history me-2"></i>Order History</h5>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle me-2"></i>
                        All your orders will appear here with tracking information.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: #f9f9f9;">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        No orders found. 
                                        <a href="{{ route('home.index') }}" class="text-decoration-none">
                                            Start shopping
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

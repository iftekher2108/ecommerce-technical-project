@extends('store::layouts.app')

@section('title', 'Saved Addresses')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="color: #dd2222; font-weight: 600;">
                    <i class="fa fa-map-marker me-2"></i>Saved Addresses
                </h3>
                <button class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                    <i class="fa fa-plus me-2"></i>Add New Address
                </button>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body p-4">
                            <p class="text-muted small mb-3">No addresses saved yet.</p>
                            <button class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                <i class="fa fa-plus me-2"></i>Add Address
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger text-white rounded-top-3 border-0">
                <h5 class="modal-title" id="addAddressModalLabel">
                    <i class="fa fa-plus me-2"></i>Add New Address
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('address.add') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State/Region</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>

                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-danger rounded-pill">
                            <i class="fa fa-save me-2"></i>Save Address
                        </button>
                        <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

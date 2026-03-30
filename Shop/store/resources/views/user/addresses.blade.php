@extends('store::layouts.app')

@section('title', 'Saved Addresses')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 style="color: var(--primary-color); font-weight: 600;">
                        <i class="fa fa-map-marker mr-2"></i> Saved Addresses
                    </h3>
                    <button class="btn btn-primary btn-sm rounded-pill" data-toggle="modal" data-target="#addAddressModal">
                        <i class="fa fa-plus mr-2"></i> Add New Address
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        @foreach ($billingAddress as $address)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="text-primary">{{ $address->full_name }}</h4>
                                        <div class="d-flex" style="gap: 3px;">
                                            <a href="" class="btn btn-info"></a>
                                            <a href="" class="btn btn-danger"></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="col-md-6">
                        @foreach ($shippingAddress as $address)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="text-primary">{{ $address->full_name }}</h4>
                                        <div class="d-flex" style="gap: 3px;">
                                            <a href="" class="btn btn-sm btn-info"></a>
                                            <a href="" class="btn btn-sm btn-danger"></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body p-4">



                            </div>




                            <p class="text-muted small mb-3">No addresses saved yet.</p>
                            <button class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#addAddressModal">
                                <i class="fa fa-plus mr-2"></i> Add Address
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Add Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="addAddressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary text-white rounded-top border-0">
                    <h5 class="modal-title" id="addAddressModalLabel">
                        <i class="fa fa-plus mr-2"></i> Add New Address
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('address.add') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address Name</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <!-- Address Line 1 -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address Line 1</label>
                                <textarea type="text" name="address_line1" class="form-control" required></textarea>
                            </div>

                            <!-- Address Line 2 -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <textarea type="text" name="address_line2" class="form-control"></textarea>
                            </div>

                            <!-- City -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>

                            <!-- State -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>

                            <!-- Postal Code -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" required>
                            </div>

                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" required>
                            </div>

                            <!-- Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address Type</label>
                                <select name="type" class="form-control">
                                    <option value="billing">Billing</option>
                                    <option value="shipping">Shipping</option>
                                </select>
                            </div>

                            <!-- Default -->
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_default" value="1" id='is_default'
                                        class="form-check-input">
                                    <label for="is_default" class="form-check-label">Set as default</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" class="btn btn-primary rounded-pill">
                                <i class="fa fa-save mr-2"></i> Save Address
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

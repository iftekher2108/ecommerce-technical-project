@extends('admin::layouts.app')
@section('title', 'Update Coupon')

@section('content')

    <div class="card col-md-12 p-2">
        <div class="card-body">

            <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                @csrf
                @method('put')
                <h5 class="p-2 bg-primary rounded mt-3">Coupon Information</h5>

                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.input name="date_start" type="date" value="{{ $coupon->date_start->format('Y-m-d') }}" title="Start Date" required="true" />
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name="date_end" type="date" value="{{ $coupon->date_end->format('Y-m-d') }}" title="End Date" required="true" />
                    </div>
                </div>

                <div class="row g-2">

                    <div class="col-md-6">
                        <x-admin::form.input name="name" value="{{ $coupon->name }}" title="Coupon Name" required="true" />
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name="code" value="{{ $coupon->code }}" title="Coupon Code" required="true" />
                    </div>

                </div>

                <div class="row g-2">

                    <div class="col-md-4">
                        <x-admin::form.input name="discount" value="{{ $coupon->discount }}" type="number" title="Discount" required="true" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.select title="Discount Type" required='true' name='dis_type'>
                            <x-admin::form.select.item value="fixed" selected="{{ ($coupon->dis_type == 'fixed')  }}" label="Fixed" />
                            <x-admin::form.select.item value="parcent" selected="{{ ($coupon->dis_type == 'parcent') }}" label="Parcent" />
                        </x-admin::form.select>
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.input name="minimum_price" value="{{ $coupon->minimum_price }}" type="number" title="Minimum Price" />
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <x-admin::form.select title="Status" name='status'>
                            <x-admin::form.select.item value="1" label="Active" />
                            <x-admin::form.select.item value="0" label="Inactive" />
                        </x-admin::form.select>
                    </div>
                </div>


                <div class="d-flex justify-content-between mt-3">

                    <x-admin::form.button class="btn-danger" type="reset">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type="submit">
                        <i class="bi bi-floppy-fill me-1"></i>
                        Update
                    </x-admin::form.button>

                </div>

            </form>

        </div>
    </div>

@endsection

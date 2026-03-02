@extends('admin::layouts.app')

@section('title', 'Edit Slider')
@section('content')
    <div class="card col-md-12 p-2">
        <div class="card-body">
            <form action="{{ route('admin.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <h5 class="p-2 bg-primary rounded mt-3">General Information</h5>

                <div class="row g-2">
                    <div class="col-md-4">
                        <x-admin::form.picture-upload title="Picture"
                            preview="{{ asset('storage/' . $slider->picture) }}" name="picture" />
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.input name='title' value="{{ $slider->title }}" title="Title" />
                    </div>
                    <div class="col-md-6">
                        <x-admin::form.input name='sub_title' value="{{ $slider->sub_title }}" title="Sub Title" />
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.input name='action' value="{{ $slider->action }}" title="Action (URL/Text)" />
                    </div>
                    <div class="col-md-6">
                        <x-admin::form.input name='order_id' value="{{ $slider->order_id }}" type="number" title="Sort Order" />
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <x-admin::form.select title="Status" name='status'>
                            <x-admin::form.select.item value="1" label="Active" />
                            <x-admin::form.select.item value="0" label="Inactive" />
                        </x-admin::form.select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <x-admin::form.button class="btn-danger" type='reset'>
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Update
                    </x-admin::form.button>
                </div>

            </form>
        </div>
    </div>
@endsection

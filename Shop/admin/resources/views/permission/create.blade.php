@extends('admin::layouts.app')
@section('title', 'New Permission')
@section('content')
    <div class="card col-md-8 p-2">
        <div class="card-body">
            <form action="{{ route('admin.permission.store') }}" method="post">
                @csrf

                <x-admin::form.input name='name' title="Name"
                    placeholder="example-[index, create, store, edit, update, delete, print, view ]" />

                <div class="d-flex justify-content-between">
                    <x-admin::form.button class="btn-danger" type='reset'>
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Submit
                    </x-admin::form.button>
                </div>

            </form>
        </div>

    </div>
@endsection

@extends('admin::layouts.app')
@section('title', 'New User Permission')
@section('content')
    <div class="card col-md-8 p-2">
        <div class="card-body">
            <form action="{{ route('admin.user-permission.update', $permission->id) }}" method="post">
                @csrf
                @method('put')
                <x-admin::form.input name='name' title="Name" value="{{ $permission->name }}"
                    placeholder="example-[index, create, store, edit, update, delete, print, view ]" />

                <div class="d-flex justify-content-between">
                    <x-admin::link class="btn-info" href="{{ route('admin.permission.index') }}">
                        <i class="bi bi-arrow-clockwise"></i>
                        Back
                    </x-admin::link>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Update
                    </x-admin::form.button>
                </div>

            </form>
        </div>

    </div>
@endsection

@extends('admin::layouts.app')
@section('title', 'Update User')
@section('content')
    <div class="card col-md-8 p-2">
        <div class="card-body">
            <form action="{{ route('admin.user.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <x-admin::form.picture-upload title="Picture" preview="{{ asset('storage/' . $admin->picture) }}" name="picture" />
                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.input name='name' value="{{ $admin->name }}" title="Name" />
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name='username' value="{{ $admin->username }}" title="Username" readonly='true' />
                    </div>
                </div>

                <x-admin::form.input type="email" name='email' value="{{ $admin->email }}" title="Email" readonly='true' />

                <x-admin::form.input type="password" name='password' value={{ $admin->password }} title="Password" />

                <x-admin::form.select title="Role" multiple='true' name='role[]'>
                    @foreach ($roles as $role )  
                        <x-admin::form.select.item :value="$role->name" :label="$role->name" :selected="$admin->roles->contains('id', $role->id)" />
                    @endforeach
                </x-admin::form.select>


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

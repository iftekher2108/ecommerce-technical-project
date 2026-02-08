@extends('admin::layouts.app')
@section('title', 'New User')
@section('content')
    <div class="card col-md-8 p-2">
        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <x-admin::form.picture-upload title="Picture" name="picture" />
                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.input name='name' title="Name" />
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name='username' title="Username" />
                    </div>
                </div>

                <x-admin::form.input type="email" name='email' title="Email" />
                <x-admin::form.input type="password" name='password' title="Password" />

                <x-admin::form.select title="Role" multiple='true' name='roles'>
                    @foreach ($roles as $item )  
                        <x-admin::form.select.item :value="$item->name" :label="$item->name" />
                    @endforeach
                </x-admin::form.select>


                <div class="d-flex justify-content-between mt-3">
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

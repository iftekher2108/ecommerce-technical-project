@extends('store::layouts.app')
@section('title', 'Login')

@push('style')
    <style>
        .login-wrapper {
            padding-bottom: 20px;
            /* min-height: 70vh; */
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .login-card .card-header {
            background: var(--primary-color);
            color: #fff;
            text-align: center;
            font-weight: 600;
            font-size: 18px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        .btn-login {
            background: var(--primary-color);
            border: none;
        }

        /* .btn-login:hover {
            background: #0056b3;
        } */
    </style>
@endpush

@section('content')

    <div class="login-wrapper">
        <div class="card login-card">
            <div class="card-header">
                Register To Your Account
            </div>

            <div class="card-body">

                <form action="{{ route('home.register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture" class="form-control p-1" value="{{ old('picture') }}">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Enter password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}" placeholder="Enter confirm password" required>
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group d-flex justify-content-between align-items-center">
                    <div>
                        <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label> 
                    </div>
                    <a href="#">Forgot Password?</a>
                </div> --}}

                    <button type="submit" class="btn btn-login btn-block text-white">
                        Register Now
                    </button>

                </form>

            </div>
        </div>
    </div>

@endsection

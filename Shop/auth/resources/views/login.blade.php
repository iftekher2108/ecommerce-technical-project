@extends('auth::layouts.app')

@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-header">
            <div class="login-logo">
                <a href="/"><b>Company Name</a>
            </div>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login in to start!</p>
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    @error('password')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror 
                </div>

                <!--begin::Row-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" name="remember_me" type="checkbox" value="1"
                                id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
            {{-- <div class="social-auth-links text-center mb-3 d-grid gap-2">
                <p>- OR -</p>
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-facebook me-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-danger">
                    <i class="bi bi-google me-2"></i> Sign in using Google+
                </a>
            </div> --}}
            <!-- /.social-auth-links -->
            {{-- <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p> --}}

        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

@extends('store::layouts.app')

@section('title', 'Account Settings')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Change Password Section -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary text-white rounded-top-3">
                    <h5 class="mb-0"><i class="fa fa-lock me-2"></i> Change Password</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('settings.password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" name="current_password" required>
                            @error('current_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Minimum 8 characters</small>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="fa fa-save me-2"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light rounded-top-3">
                    <h6 class="mb-0" style="color: var(--primary-color); font-weight: 600;">
                        <i class="fa fa-info-circle me-2"></i> Account Information
                    </h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Member Since:</strong>
                        <p>{{ Auth::user()->created_at->format('F d, Y') }}</p>
                    </div>
                    <hr>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary rounded-pill">
                        <i class="fa fa-edit me-2"></i>Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('store::layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-5">

                        <div class="text-center mb-4">
                            <h4 class="fw-bold">Verify Your Email</h4>
                            <p class="text-muted small mb-0">
                                A 6-digit verification code has been sent to your email.
                            </p>
                        </div>

                        <form action="{{ route('user.emailSubmit.verify') }}" method="POST">
                            @csrf

                            <div class="mb-4 text-center">
                                <label class="form-label fw-semibold">Enter Verification Code</label>

                                <input type="hidden" name="email" value="{{ session('verify_email') }}" >

                                <input type="text" name="code"
                                    class="form-control text-center fs-4 tracking-wide @error('code') is-invalid @enderror"
                                    placeholder="------" maxlength="6" style="letter-spacing: 10px; font-weight: 600;"
                                    required>

                                @error('code')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block border-0 rounded-3 py-2 fw-semibold"
                                style="background: var(--primary-color);">
                                Verify Code
                            </button>

                        </form>

                        <p class="text-muted small mt-2">
                            Code expires in <span id="timer">05:00</span>
                        </p>

                        <div class="text-center mt-4">
                            <small class="text-muted">
                                Didn’t receive the code?
                            </small>

                            <form action="{{ route('user.email.resend') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="email" value="{{ session('verify_email') }}" >
                                <button type="submit" class="btn btn-link text-decoration-none fw-semibold p-0">
                                    Resend Code
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let duration = 300; // secounds
        let display = document.getElementById('timer');

        let timer = setInterval(function() {
            let minutes = parseInt(duration / 60, 10);
            let seconds = parseInt(duration % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--duration < 0) {
                clearInterval(timer);
                display.textContent = "Expired";
            }
        }, 1000);
    </script>
@endpush

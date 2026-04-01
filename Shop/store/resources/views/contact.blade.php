@extends('store::layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-5 mb-4">
            <h3 class="mb-4">Contact Information</h3>
            <p><strong>Address:</strong> {{ $setting['contact.address'] }}</p>
            <p><strong>Phone:</strong> {{ $setting['contact.phone'] }}</p>
            <p><strong>Email:</strong> {{ $setting['contact.email'] }}</p>

            <hr>

            {{-- <h5>Business Hours</h5>
            <p>Sunday - Thursday: 9:00 AM - 6:00 PM</p>
            <p>Friday: Closed</p>
            <p>Saturday: 10:00 AM - 4:00 PM</p> --}}
        </div>

        <!-- Contact Form -->
        <div class="col-md-7">
            <h3 class="mb-4">Send Us a Message</h3>

            <form action="{{ route('home.contact.submit') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter subject">
                </div>

                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" rows="5" class="form-control" placeholder="Write your message..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
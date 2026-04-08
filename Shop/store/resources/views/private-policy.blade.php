@extends('store::layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Privacy Policy</h1>
    
    <div class="row">
        <div class="col-md-12">
            <p><strong>Effective Date:</strong> [Insert Date]</p>
            
            <h2>Introduction</h2>
            <p>We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website or make a purchase.</p>
            
            <h2>Information We Collect</h2>
            <p>We may collect personal information such as your name, email address, shipping address, and payment details when you place an order or create an account.</p>
            
            <h2>How We Use Your Information</h2>
            <p>Your information is used to process orders, provide customer service, improve our website, and send promotional emails if you opt-in.</p>
            
            <h2>Cookies</h2>
            <p>We use cookies to enhance your browsing experience. You can manage cookie preferences through your browser settings.</p>
            
            <h2>Data Sharing</h2>
            <p>We do not sell or rent your personal information to third parties. We may share data with service providers for order fulfillment.</p>
            
            <h2>Data Security</h2>
            <p>We implement security measures to protect your data, but no method is 100% secure.</p>
            
            <h2>Your Rights</h2>
            <p>You have the right to access, update, or delete your personal information. Contact us to exercise these rights.</p>
            
            <h2>Changes to This Policy</h2>
            <p>We may update this Privacy Policy. Changes will be posted on this page with an updated effective date.</p>
            
            <h2>Contact Us</h2>
            <p>If you have questions, please contact us at support@example.com or call 1-800-123-4567.</p>
            <a href="{{ route('home.contact') }}" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>
@endsection
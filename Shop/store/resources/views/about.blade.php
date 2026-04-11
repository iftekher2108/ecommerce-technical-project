@extends('store::layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">About Us</h1>
    
    <div class="row">
        <div class="col-md-8">
            <h2>Our Story</h2>
            <p>Founded in [Year], our ecommerce store started with a passion for providing high-quality products at affordable prices. We have grown from a small online shop to a trusted retailer serving customers worldwide.</p>
            
            <h2>Our Mission</h2>
            <p>Our mission is to offer a seamless shopping experience, exceptional customer service, and a wide range of products that meet the needs of our diverse customer base. We are committed to sustainability, quality, and innovation.</p>
            
            <h2>Our Values</h2>
            <ul class="ml-4">
                <li><strong>Customer-Centric:</strong> Your satisfaction is our top priority.</li>
                <li><strong>Quality:</strong> We source only the best products.</li>
                <li><strong>Innovation:</strong> We embrace new technologies to improve your experience.</li>
                <li><strong>Sustainability:</strong> We strive to minimize our environmental impact.</li>
            </ul>
            
            <h2>Our Team</h2>
            <p>Our dedicated team of professionals works tirelessly to ensure every order is handled with care. From our customer service representatives to our logistics experts, we are here to support you.</p>
        </div>
        
        <div class="col-md-4">
            <h3>Get in Touch</h3>
            <p>Have questions about our story or products? Reach out to us.</p>
            <a href="{{ route('home.contact') }}" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>
@endsection
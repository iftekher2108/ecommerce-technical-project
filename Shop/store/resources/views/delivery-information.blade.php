@extends('store::layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Delivery Information</h1>
    
    <div class="row">
        <div class="col-md-8">
            <h2>Shipping Options</h2>
            <p>We offer various shipping methods to ensure your order arrives quickly and safely:</p>
            <ul>
                <li><strong>Standard Shipping:</strong> 5-7 business days, free on orders over $50.</li>
                <li><strong>Express Shipping:</strong> 2-3 business days, $10 additional fee.</li>
                <li><strong>Overnight Shipping:</strong> Next business day, $20 additional fee.</li>
            </ul>
            
            <h2>Delivery Times</h2>
            <p>Delivery times may vary based on your location and the shipping method selected. We aim to process and ship orders within 1-2 business days.</p>
            
            <h2>Shipping Costs</h2>
            <p>Shipping costs are calculated at checkout based on the weight, dimensions, and destination of your order. Free shipping is available on qualifying orders.</p>
            
            <h2>International Shipping</h2>
            <p>We ship to select international destinations. Additional customs fees and duties may apply and are the responsibility of the recipient.</p>
            
            <h2>Tracking Your Order</h2>
            <p>Once your order ships, you will receive a tracking number via email. You can use this to monitor the status of your delivery.</p>
            
            <h2>Delivery Issues</h2>
            <p>If you encounter any issues with your delivery, please contact our customer service team at support@example.com or call 1-800-123-4567.</p>
        </div>
        
        <div class="col-md-4">
            <h3>Need Help?</h3>
            <p>Contact us for more details on delivery options.</p>
            <a href="{{ route('home.contact') }}" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>
@endsection
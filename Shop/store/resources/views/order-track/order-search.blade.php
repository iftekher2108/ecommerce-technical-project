@extends('store::layouts.app')
@section('title', 'Track Order Search')

@section('content')
<div class="container d-flex justify-content-center align-items-center p-4">
    <div class="card shadow-sm" style="max-width: 500px; width: 100%; border-radius: 10px;">
        
        <div class="card-body p-4">
            <h3 class="text-center mb-4">
                <span style="color: var(--primary-color);">O</span>rder 
                <span style="color: var(--primary-color);">T</span>raking
            </h3>

            <form 
            {{-- action="{{ route('order.track') }}" --}}
             method="GET">
                
                <div class="form-group">
                    <label><strong>Order Number</strong></label>
                    <input type="text" 
                           name="order_number" 
                           class="form-control" 
                           placeholder="Order Tracking Number"
                           required>
                    
                    {{-- Error Message Example --}}
                    @if(session('error'))
                        <small class="text-danger d-block mt-2">
                            {{ session('error') }}
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn primary-btn btn-block">
                    Check Status
                </button>

            </form>
        </div>

    </div>
</div>
@endsection
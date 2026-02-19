@include('store::layouts.header')
<div class="px-3 ">
{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success rounded-3 my-2">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if (session('error'))
    <div class="alert alert-danger rounded-3 my-2">
        {{ session('error') }}
    </div>
@endif
</div>

@yield('content')

@include('store::layouts.footer')

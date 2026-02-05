@props([
    'class'
])

<div {{ $attributes->merge(['class' => "alert alert-dismissible fade show mb-3 " . $class]) }} role="alert">
  {{ $slot }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

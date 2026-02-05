@props([
    'value' => '',
    'label' => null,
    'selected' => false,
    'disabled' => false,
])

@php
    $labelText = $label ?? $value;
@endphp

<option value="{{ $value }}" @if ($selected) selected @endif @if ($disabled) disabled @endif>
    {{ $labelText }}{{ $slot }}
</option>

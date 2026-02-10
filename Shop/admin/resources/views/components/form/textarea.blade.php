@props([
    'name',
    'title' => null,
    'id' => null,
    'class' => '',
    'label_class' => '',
    'value' => '',
    'placeholder' => '',
    'help' => '',
    'readonly' => false,
    'onChange' => '',
])

@php
    $inputId = $id ?? $name;
    $labelText = $title ?? null;
@endphp

<div class="mb-2">
    @if ($labelText)
        <label
            {{ $attributes->merge([
                'for' => $name,
                'class' => $label_class,
            ]) }}>{{ $labelText }}</label>
    @endif
    <div class="input-group">
        <textarea
            {{ $attributes->merge([
                'class' => 'form-control ' . $class,
                'name' => $name,
                'id' => $inputId,
                'placeholder' => $placeholder,
                'readonly' => $readonly,
                'onChange' => $onChange,
            ]) }}> {{$value}}</textarea>
    </div>

    @if ($help)
        <small class="form-text text-warning">{{ $help }}</small>
    @endif

    @error($name)
        <p class="small text-danger">{{ $message }}</p>
    @enderror
</div>

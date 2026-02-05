@props([
    'name',
    'title' => null,
    'id' => null,
    'type' => 'text',
    'class' => '',
    'label_class' => '',
    'prefix' => '',
    'suffix' => '',
    'value' => '',
    'placeholder' => '',
    'help' => '',
    'onChange' => '',
])

@php
    $inputId = $id ?? $name;
    $labelText = $title ?? $name;
@endphp

<div class="mb-2">
    <label {{ $attributes->merge([
        'for' => $name,
        "class" => $label_class,
    ]) }}>{{ $labelText }}</label>
    <div class="input-group">
        @if ($prefix)
            <div class="input-group-text bg-primary">{!! $prefix !!}</div>
        @endif
        <input {{ $attributes->merge([
            'type' => $type,
            "class" => "form-control " . $class,
            "name" => $name,
            "id" => $inputId,
            'placeholder' => $placeholder,
            'value' => $value,
            'onChange' => $onChange,
    ]) }} />
        @if ($suffix)
            <div class="input-group-text bg-primary">{!! $suffix !!}</div>
        @endif
    </div>

    @if ($help)
        <small class="form-text text-warning">{{ $help }}</small>
    @endif

    @error($name)
        <p class="small text-danger">{{ $message }}</p>
    @enderror
</div>

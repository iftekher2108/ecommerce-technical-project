@props([
    'type' => 'button',
    'class' => '',
    'id' => null,
    'onClick' => null,
    'disabled' => false,
])
<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "btn " . $class,
        'id' => $id,
        'onclick' => $onClick,
        'disabled' => $disabled,
    ]) }}>
    {{ $slot }}
</button>

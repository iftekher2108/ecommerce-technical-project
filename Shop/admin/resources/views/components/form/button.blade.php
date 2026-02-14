@props([
    'type' => 'button',
    'class' => '',
    'id' => null,
    'onClick' => '',
    'disabled' => false,
    'multiple' => false,
])
<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "btn @if ($multiple) 'select2bs5' @endif " . $class,
        'id' => $id,
        'onclick' => $onClick,
        'disabled' => $disabled,
    ]) }}>
    {{ $slot }}
</button>

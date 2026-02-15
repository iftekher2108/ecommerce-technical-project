@props([
    'name',
    'title' => null,
    'class' => '',
    'label_class' => '',
    'id' => null,
    'options' => [],
    'placeholder' => '',
    'value' => null,
    'choose_text' => null,
    'multiple' => null,
    'required' => false,
    'help' => '',
])

@php
    $inputId = $id ?? $name;
    $labelText = $title ?? $name;
@endphp

<div class="mb-2">
    <label for="{{ $inputId }}" class="{{ $label_class }}">{{ $labelText }} @if ($required)
                <span class="text-danger">*</span>
            @endif</label>
    <select
        {{ $attributes->merge([
            'class' => 'form-control form-select ' . ($multiple ? 'select2bs5 ' : ' ') . $class,
            'name' => $name,
            'id' => $inputId,
            'multiple' => $multiple ? true : false,
            'required' => $required,
        ]) }}>
        @if ($choose_text)
            <option value="">{{ $choose_text }}</option>
        @endif

        @if (trim($slot ?? '') !== '')
            {{ $slot }}
        @else
            @foreach ($options as $key => $option)
                @php
                    if (is_array($option)) {
                        $optionValue = $option['value'] ?? $key;
                        $optionLabel = $option['label'] ?? $optionValue;
                        $optionDisabled = $option['disabled'] ?? false;
                        $optionSelected = $option['selected'] ?? false;
                    } else {
                        $optionValue = $key;
                        $optionLabel = $option;
                        $optionDisabled = false;
                        $optionSelected = false;
                    }

                    $isSelected = $optionSelected;
                    if (is_array($value)) {
                        $isSelected = in_array($optionValue, $value);
                    } elseif ($value !== null) {
                        $isSelected = (string) $optionValue === (string) $value;
                    }
                @endphp
                <x-admin::form.select.item :value="$optionValue" :label="$optionLabel" :selected="$isSelected" :disabled="$optionDisabled" />
            @endforeach
        @endif
    </select>
    @if ($help)
        <small class="form-text text-warning">{{ $help }}</small>
    @endif

    @error($name)
        <p class="small text-danger">{{ $message }}</p>
    @enderror
</div>

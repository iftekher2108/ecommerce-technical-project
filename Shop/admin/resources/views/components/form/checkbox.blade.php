@props([
    'name' => null,
    'title' => null,
    'id' => 'checkbox-item',
    'checked' => false,
    'value' => '',
    'label_class' => '',
    'class' => '',
])

<div class="mb-2">
    <div class="form-check">
        <input class="form-check-input {{ $class }}" type="checkbox" @if($checked) checked @endif name="{{ $name }}" value="{{ $value }}" id="{{ $id }}">
        @if ($title)
         <label class="form-check-label {{ $label_class }}" for="{{ $id }}">
            {{ $title }}
        </label>   
        @endif  
    </div>
</div>

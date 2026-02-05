@props([
    'name',
    'title' => null,
    'class' => '',
    'label_class' => '',
    'id' => null,
    'multiple' => false,
    'accept' => 'image/*',
    'help' => '',
    'preview' => null,
])

@php
    $inputId = $id ?? $name;
    $previewId = $inputId . '-preview';
    $labelText = $title ?? $name;
@endphp

<div class="mb-2">
    <label for="{{ $inputId }}" class="{{ $label_class }}">{{ $labelText }}</label>
    <input {{ $attributes->merge([
        'type' => 'file',
        'class' => 'form-control p-1 ' . $class,
        'name' => $name,
        'id' => $inputId,
        'accept' => $accept,
    ]) }} @if ($multiple) multiple @endif />

    @if ($help)
        <small class="form-text text-warning">{{ $help }}</small>
    @endif

    <div id="{{ $previewId }}" class="mt-2 d-flex flex-wrap">
        @if ($preview)
            @php
                $previews = is_array($preview) ? $preview : [$preview];
            @endphp
            @foreach ($previews as $url)
                @if ($url)
                    <div class="border rounded p-1 mr-2 mb-2 bg-light">
                        <img src="{{ $url }}" alt="Preview" class="img-thumbnail" style="max-width: 120px; max-height: 120px; object-fit: cover;">
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    @error($name)
        <p class="small text-danger">{{ $message }}</p>
    @enderror
</div>

<script>
    (function () {
        var input = document.getElementById(@json($inputId));
        var preview = document.getElementById(@json($previewId));
        if (!input || !preview) return;

        function clearPreview() {
            preview.innerHTML = '';
        }

        function renderPreview(files) {
            clearPreview();
            if (!files || !files.length) return;

            Array.prototype.forEach.call(files, function (file) {
                if (!file.type || file.type.indexOf('image/') !== 0) return;

                var reader = new FileReader();
                reader.onload = function (e) {
                    var wrapper = document.createElement('div');
                    wrapper.className = 'border rounded p-1 mr-2 mb-2 bg-light';

                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;
                    img.className = 'img-thumbnail';
                    img.style.maxWidth = '120px';
                    img.style.maxHeight = '120px';
                    img.style.objectFit = 'cover';

                    wrapper.appendChild(img);
                    preview.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });
        }

        input.addEventListener('change', function (e) {
            renderPreview(e.target.files);
        });
    })();
</script>

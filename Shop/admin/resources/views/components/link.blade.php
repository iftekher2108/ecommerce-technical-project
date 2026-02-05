@props([
    "class" => '',
    "href" => null,
    "target" => null,

])
<a {{ $attributes->merge([
    "class" => "btn " . $class,
    "href" => $href ?? "javascript:void(0);",
    "target" => $target ?? "_self",
]) }}>
{{ $slot }}
</a>

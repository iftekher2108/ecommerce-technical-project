@props([
    'status'
])

<span class="badge @if($status) bg-success @else bg-danger @endif">{{ $status  ? 'Active' : 'Inactive' }}</span>
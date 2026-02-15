@props(['title', 'data'])

<div class="d-flex gap-1">
    @foreach ($data as $item)
        @if ($item['type'] == 'delete')
            @can($title . '-delete')
                <form action="{{ $item['url'] }}" class="delete-item" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm {{ $item['color'] }}"
                        onclick="return confirm('Are you sure you want to delete this item?')">{!! $item['label'] !!}</button>
                </form>
            @endcan
        @elseif ($item['type'] == 'edit')
            @can($title . '-edit')
                <a href="{{ $item['url'] }}" class="btn btn-sm {{ $item['color'] }}">{!! $item['label'] !!}</a>
            @endcan
        @elseif ($item['type'] == 'view')
            @can($title . '-view')
                <a href="{{ $item['url'] }}" class="btn btn-sm {{ $item['color'] }}">{!! $item['label'] !!}</a>
            @endcan
        @elseif ($item['type'] == 'status')
            @can($title . '-status')
                <a href="{{ $item['url'] }}" class="btn btn-sm {{ $item['color'] }}">{!! $item['label'] !!}</a>
            @endcan
        @else
            <a href="{{ $item['url'] }}" class="btn btn-sm {{ $item['color'] }}">{!! $item['label'] !!}</a>
        @endif
    @endforeach
</div>

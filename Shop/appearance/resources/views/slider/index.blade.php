@extends('admin::layouts.app')

@section('title', 'Slider Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.slider.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('slider-create')
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create Slider</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sliders as $item)
                    <tr class="align-middle">
                        <td>{{ $item->order_id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->picture) }}" class="img-thumbnail" width="50"
                                height="50" alt="picture">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->sub_title }}</td>
                        <td>{{ $item->action }}</td>
                        <td>
                            <x-admin::table.badge :status="$item->status" />
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.slider.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                    [
                                        'type' => 'status',
                                        'url' => route('admin.slider.status', $item->id),
                                        'color' => ($item->status == 1) ? 'btn-success' : 'btn-danger',
                                        'label' => ($item->status == 1) ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-x-lg"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.slider.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='slider' :data="$data" />
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $sliders->links() }}


@endsection

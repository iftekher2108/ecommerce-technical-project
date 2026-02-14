@extends('admin::layouts.app')
@section('title', 'Coupon Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.coupon.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('category-create')
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create Category</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($coupons as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->picture) }}" class="img-thumbnail" width="50"
                                height="50" alt="picture">
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            <x-admin::table.badge :status="$item->status" />
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.category.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.category.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='user' :data="$data" />
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $coupons->links() }}


@endsection

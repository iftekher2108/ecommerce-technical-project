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
        @can('coupon-create')
            <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create Coupon</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Minimum Price</th>
                    <th>Duration</th>
                    <th>Total Used</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($coupons as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->code }}
                        </td>
                        <td>
                            {{ $item->minimum_price }}
                        </td>
                        <td>
                            {{ $item->date_start->format('d-M-Y') }} --- {{ $item->date_end->format('d-M-Y') }}
                        </td>
                        <td>
                            {{ $item->used_total }}
                        </td>
                        <td>
                            <x-admin::table.badge :status="$item->status" />
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.coupon.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                     [
                                        'type' => 'status',
                                        'url' => route('admin.coupon.status', $item->id),
                                        'color' => ($item->status == 1) ? 'btn-success' :'btn-danger',
                                        'label' => ($item->status == 1) ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-x-lg"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.coupon.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='coupon' :data="$data" />
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $coupons->links() }}


@endsection

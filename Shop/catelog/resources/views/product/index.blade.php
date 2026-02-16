@extends('admin::layouts.app')
@section('title', 'Product Management')
@section('content')
    @if($errors->any())
    @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
    @endif
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.product.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('product-create')
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create Product</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>banner</th>
                    <th>Picture</th>
                    <th>Sku</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Cost Price</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->banner) }}" class="img-thumbnail" width="50"
                                height="50" alt="banner">
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $item->picture) }}" class="img-thumbnail" width="50"
                                height="50" alt="picture">
                        </td>
                        <td>
                            {{ $item->sku }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->stock }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                        <td>
                            {{ $item->sale_price }}
                        </td>
                        <td>
                            {{ $item->cost_price }}
                        </td>
                        <td>
                            <x-admin::table.badge :status="$item->status" />
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.product.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                     [
                                        'type' => 'status',
                                        'url' => route('admin.product.status', $item->id),
                                        'color' => ($item->status == 1) ? 'btn-success' : 'btn-danger',
                                        'label' => ($item->status == 1) ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-x-lg"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.product.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='product' :data="$data" />
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $products->links() }}


@endsection

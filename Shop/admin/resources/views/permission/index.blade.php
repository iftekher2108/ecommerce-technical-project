@extends('admin::layouts.app')
@section('title', 'Permission Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.permission.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('permission-create')
            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create
                Permission</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Permission</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($permissions as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.permission.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.permission.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='permission' :data="$data" />
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

    {{ $permissions->links() }}


@endsection

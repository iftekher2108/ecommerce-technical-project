@extends('admin::layouts.app')
@section('title', 'Role Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.role.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('role-create')
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create Role</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            @foreach ($item->permissions as $permission)
                                {{ $permission->name }} @if (!$loop->last)
                                    |
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.role.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.role.delete', $item->id),
                                        'color' => 'btn-danger',
                                        'label' => '<i class="bi bi-trash"></i>',
                                    ],
                                ];
                            @endphp
                            <x-admin::action-btn title='role' :data="$data" />
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

    {{ $roles->links() }}


@endsection

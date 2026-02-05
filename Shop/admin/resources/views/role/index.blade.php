@extends('admin::layouts.app')
@section('title', 'Role Management')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Create Role</a>
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
                        <td>{{ $item->permissions }}</td>
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

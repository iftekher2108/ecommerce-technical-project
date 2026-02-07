@extends('admin::layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td><img src="" class="img-thumbnail" width="40" height="40" alt="avater"></td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->username }}
                        </td>
                        <td>
                            @foreach ($item->permissions as $permission )
                                {{ $permission->name }} @if (!$loop->last) | @endif
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

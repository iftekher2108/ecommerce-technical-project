@extends('admin::layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.user.index') }}" class="d-flex gap-2" method="GET">
            <x-admin::form.input name="search" :value="$search" />
            <x-admin::form.button type="submit" class="btn-primary mb-2">
                Search
            </x-admin::form.button>
        </form>
        @can('user-create')
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Create User</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($admins as $key => $item)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset('storage/' . $item->picture) }}" class="img-thumbnail" width="50"
                                height="50" alt="avater"></td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->username }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            @foreach ($item->roles as $role)
                                {{ $role->name }} @if (!$loop->last)
                                    |
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @php
                                $data = [
                                    [
                                        'type' => 'edit',
                                        'url' => route('admin.user.edit', $item->id),
                                        'color' => 'btn-primary',
                                        'label' => '<i class="bi bi-pencil-square"></i>',
                                    ],
                                    [
                                        'type' => 'delete',
                                        'url' => route('admin.user.delete', $item->id),
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

    {{ $admins->links() }}


@endsection

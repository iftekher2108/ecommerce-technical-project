@extends('admin::layouts.app')
@section('title', 'Permission Management')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">Create Permission</a>
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
                            <x-admin::action-btn title='role' :data="$data" />
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

        {{ $permissions->links() }}


@endsection

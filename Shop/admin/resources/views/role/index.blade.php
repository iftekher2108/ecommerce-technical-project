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

                <tr class="align-middle">
                    <td>1.</td>
                    <td>

                    </td>
                    <td>Update software</td>
                    <td>
                        <a href="{{ route('admin.role.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('admin.role.delete', 1) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            
             
            </tbody>
        </table>

    </div>


@endsection

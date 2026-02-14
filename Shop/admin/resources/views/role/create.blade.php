@extends('admin::layouts.app')
@section('title', 'New Role')
@section('content')
    <div class="card col-md-12 p-2">
        <div class="card-body">
            <form action="{{ route('admin.role.store') }}" method="post">
                @csrf

                <x-admin::form.input name='name' title="Name" />

                <div class="d-flex justify-content-end gap-3 mb-2">
                    <x-admin::form.button class="btn-primary select-all">
                        Select All
                    </x-admin::form.button>
                    <x-admin::form.button class="btn-danger deselect-all">
                        Deselect All
                    </x-admin::form.button>
                </div>

                <div class="row justify-content-center align-items-center g-2 mb-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <Thead>
                                <th>Label</th>
                                <th>Action</th>
                            </Thead>
                            <tbody>
                                @foreach ($permissions as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td align="center">
                                            <input type="checkbox" name="permissions[]" value="{{ $item->name }}"
                                                class="btn-check" id="{{ $item->name }}-{{ $item->id }}"
                                                autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                for="{{ $item->name }}-{{ $item->id }}">{{ $item->name }}</label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="d-flex justify-content-between">
                    <x-admin::form.button class="btn-danger" type='reset'>
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Submit
                    </x-admin::form.button>
                </div>

            </form>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $('.select-all').click(function() {
            $('input[type="checkbox"]').prop('checked', true)
        })
        $('.deselect-all').click(function() {
            $('input[type="checkbox"]').prop('checked', false)
        })
    </script>
@endpush

@extends('admin::layouts.app')
@section('title', 'New Category')
@section('content')
    <div class="card col-md-12 p-2">
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h5 class="p-2 bg-primary rounded mt-3">General Information</h5>

                <div class="row g-2">
                    <div class="col-md-4">
                        <x-admin::form.picture-upload title="Icon" preview="{{ asset('storage/' . $category->icon) }}"
                            name="icon" help="Upload a square Image (150x150px)" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.picture-upload title="Banner" preview="{{ asset('storage/' . $category->banner) }}"
                            name="banner" help="Image diamension: 1280x720px" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.picture-upload title="Picture" preview="{{ asset('storage/' . $category->picture) }}"
                            name="picture" help="Image diamension: 500x500px" />
                    </div>

                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.select title="Role" name='category' choose_text='Choose One'
                            help="if you need parent else null">
                            @foreach ($categories as $item)
                                <x-admin::form.select.item :value="$item->id" :label="$item->name" />
                            @endforeach
                        </x-admin::form.select>
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name='name' required='true' value="{{ $category->name }}" title="Name" />
                    </div>

                </div>

                <x-admin::form.textarea name='description' value="{{ $category->description }}" title="Description" />

                <x-admin::form.input name='order_id' value="{{ $category->order_id }}" type="number" title="Sort Order" />


                <div class="card p-2">
                    <h5 class="p-2 bg-primary rounded mt-3">SEO Information</h5>

                    <x-admin::form.checkbox id='sameAs' value='1' title="Same As" />

                    <x-admin::form.input name='meta_title' value="{{ $category->meta_title }}" title="Meta Title" />

                    <x-admin::form.textarea name='meta_description' value="{{ $category->meta_description }}"
                        title="Meta Description" />

                    <x-admin::form.input name='meta_keywords' value="{{ $category->meta_keywords }}"
                        title="Meta Keywords" />
                </div>


                {{-- <x-admin::form.select title="Role" multiple='true' name='role[]'>
                    @foreach ($roles as $item)  
                        <x-admin::form.select.item :value="$item->name" :label="$item->name" />
                    @endforeach
                </x-admin::form.select> --}}

                <div class="row mt-3">
                    <div class="col-md-6">
                        <x-admin::form.select title="Status" name='status'>
                            <x-admin::form.select.item value="1" label="Active" />
                            <x-admin::form.select.item value="0" label="Inactive" />
                        </x-admin::form.select>
                    </div>
                </div>


                <div class="d-flex justify-content-between mt-3">
                    <x-admin::form.button class="btn-danger" type='reset'>
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Update
                    </x-admin::form.button>
                </div>

            </form>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $('#sameAs').change(function() {
            if ($(this).prop('checked')) {
                $("input[name='meta_title']").val($("input[name='name']").val());
                $("textarea[name='meta_description']").val($("textarea[name='description']").val());
            } else {
                $("input[name='meta_title']").val("{{ old('meta_title', $category->meta_title) }}");
                $("textarea[name='meta_description']").val("{{ old('meta_description', $category->meta_description) }}");
            }
        });
    </script>
@endpush

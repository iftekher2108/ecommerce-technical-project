@extends('admin::layouts.app')
@section('title', 'Setting Management')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                            aria-selected="true">General Information</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                    </div>
                </nav>
                <div class="tab-content mb-3 p-2" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                        aria-labelledby="nav-general-tab" tabindex="0">
                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Logo"
                                    preview="{{ asset('storage/' . $setting['logo']) }}" name="logo" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Icon"
                                    preview="{{ asset('storage/' . $setting['icon']) }}" name="icon" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name='title' value="{{ $setting['title'] }}" required='true' title="Title" />
                            </div>

                            <div class="col-md-12">
                                <x-admin::form.textarea name='description' value="{{ $setting['description'] }}" title="Description" />
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-end">
                                            <x-admin::form.button class="btn-primary add-social-btn">
                                                <i class="bi bi-plus-lg"></i>
                                                Add New
                                            </x-admin::form.button>
                                        </div>

                                        <div class="social-container my-3">
                                            <div class="social-item row g-2">
                                                <div class="col">
                                                    <x-admin::form.input name="social[][icon]" placeholder="Icon" />
                                                </div>
                                                <div class="col">
                                                    <x-admin::form.input name='social[][title]' placeholder="title" />
                                                </div>
                                                <div class="col">
                                                    <x-admin::form.input name='social[][link]' placeholder="link" />
                                                </div>
                                                <div class="col-1">
                                                    <x-admin::form.button class="btn-danger social-item-remove">
                                                        <i class="bi bi-trash"></i>
                                                    </x-admin::form.button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">
                        ...
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">
                        ...
                    </div>

                    <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        ...
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
        $('.add-social-btn').click(function() {
            let html = `
            <div class="social-item row g-2">
                    <div class="col">
                        <x-admin::form.input name="social[][icon]" placeholder="Icon" />
                    </div>
                    <div class="col">
                        <x-admin::form.input name='social[][title]' placeholder="title" />
                    </div>
                    <div class="col">
                        <x-admin::form.input name='social[][link]' placeholder="link" />
                    </div>
                    <div class="col-1">
                        <x-admin::form.button class="btn-danger social-item-remove">
                            <i class="bi bi-trash"></i>
                        </x-admin::form.button>
                    </div>
                </div>`;
            if($('.social-item').length < 6) {
                $('.social-container').append(html);
            } else {
                alert("you can't added more then 6!")
            }
        })

        $(document).on('click', '.social-item-remove', function() {
            $(this).closest('.social-item').slideUp(300, function() {
                $(this).remove();
            });
        })
    </script>
@endpush

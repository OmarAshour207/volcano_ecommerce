@push('admin_scripts')
    <script type="text/javascript">
        var url = window.location.href;
        var path = url.split('/')[4];
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('#mainphoto').dropzone({
                url: '{{ route('upload.image') }}',
                paramName:'image',
                autoDiscover: false,
                uploadMultiple: false,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                dictDefaultMessage: '{{ __('admin.upload_photo') }}',
                dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
                params: {
                    _token: '{{ csrf_token() }}',
                    path: path,
                    width: 165,
                    height: 165
                },
                addRemoveLinks: true,
                removedfile:function (file) {
                    var imageName = $('.image_name').val();
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '{{ route('remove.image') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image: imageName,
                            path: path
                        }
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init: function () {

                    @if(!empty($user->image))
                    var mock = { name: '{{ $user->name }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $user->user_image }}');
                    this.emit('complete', mock);
                    $('.dz-progress').remove();
                    @endif

                    this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    })
                }
            });
        });
    </script>
    <style type="text/css">

        .dropzone {
            width: 200px;
            height: 90px;
            min-height: 0px !important;
            background-color: #1C2260;
            border: #1C2260;
        }
    </style>
@endpush

@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit_profile') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.profile') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('update.profile') }}" enctype="multipart/form-data">

                    @method('post')
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">{{ __('admin.profile_info') }}</strong></p>
                            <p class="text-muted">{{ __('admin.edit_profile') }}</p>
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <div class="form-group">
                                <label for="name">{{ __('admin.full_name') }}</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="{{ __('admin.full_name') }}" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">{{ __('admin.update_password') }}</strong></p>
                            <p class="text-muted">{{ __('admin.change_password') }}</p>
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <div class="form-group">
                                <label for="opass">{{ __('admin.old_password') }}</label>
                                <input style="width: 270px;" id="opass" name="old_password" type="password" class="form-control">
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="npass">{{ __('admin.new_password') }}</label>
                                    <input style="width: 270px;" id="npass" name="new_password" type="password" class="form-control" placeholder="{{ __('admin.new_password') }}">
                                </div>
                                <div class="form-group col">
                                    <label for="cpass">{{ __('admin.confirm_password') }}</label>
                                    <input style="width: 270px;" id="cpass" name="confirm_new_password" type="password" class="form-control" placeholder="{{ __('admin.confirm_password') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">{{ __('admin.profile_settings') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <input class="image_name" type="hidden" name="image" value="{{ $user->image }}">
                        </div>
                        <div class="form-group">
                            <label> {{ __('admin.photo') }} </label>
                            <div class="dropzone" id="mainphoto"></div>
                        </div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

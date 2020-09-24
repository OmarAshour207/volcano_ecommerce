@push('admin_scripts')
    <script type="text/javascript">
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
                    path: 'aboutus',
                    width: 875,
                    height: 800
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
                            path: 'aboutus'
                        }
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init: function () {

                    @if(!empty($about->image))
                    var mock = { name: '{{ $about->title }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $about->about_image }}');
                    this.emit('complete', mock);
                    $('.dz-progress').remove();
                    @endif
                        this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    });
                }
            });
        });
    </script>
    <style type="text/css">

        #mainphoto {
            width: 200px;
            height: 200px;
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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.about') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.about') }} / {{ trans('admin.title') }}</label>
                        <input id="desc" type="text" name="title" class="form-control" placeholder="{{ trans('admin.about') }} / {{ trans('admin.title') }}..." value="{{ $about->title }}">
                    </div>

                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.about') }} / {{ trans('admin.description') }}</label>
                        <textarea id="desc" name="description" rows="4" class="form-control" placeholder="{{ trans('admin.about') }} / {{ trans('admin.description') }}...">{{ $about->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="{{ $about->image }}">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

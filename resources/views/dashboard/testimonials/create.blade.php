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
                    width: 100,
                    height: 100
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
                    this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    })
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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.testimonials') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="name"> {{ trans('admin.testimonials') }} / {{ trans('admin.name') }}</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('admin.name') }}" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="title"> {{ trans('admin.testimonials') }} / {{ trans('admin.title') }}</label>
                        <input id="title" name="title" type="text" class="form-control" placeholder="{{ __('admin.title') }}" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.testimonials') }} / {{ trans('admin.description') }}</label>
                        <textarea id="desc" name="description" rows="4" class="form-control" placeholder="{{ trans('admin.testimonials') }} / {{ trans('admin.description') }}...">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="meta_tag"> {{ trans('admin.testimonials') }} / {{ trans('admin.meta_tag') }}</label>
                        <input id="meta_tag" name="meta_tag" type="text" class="form-control" placeholder="{{ trans('admin.meta_tag') }}" value="{{ old('meta_tag') }}">
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

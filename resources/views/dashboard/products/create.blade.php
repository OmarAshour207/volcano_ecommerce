@push('admin_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('upload.product.image') }}',
            maxFilesize: 2, // MB
            maxFiles:5,
            dictDefaultMessage: '{{ __('admin.upload_photo') }}',
            addRemoveLinks: true,
            params: {
                _token: '{{ csrf_token() }}',
                width: 570,
                height: 580
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url: '{{ route('remove.product.image') }}',
                    data:{
                        _token: '{{ csrf_token() }}',
                        id: name,
                    }
                });
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            }
        }
    </script>
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
                    <h1 class="m-0"> {{ trans('admin.product') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="title"> {{ trans('admin.product') }} / {{ trans('admin.title') }}</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="{{ trans('admin.product') }} / {{ trans('admin.title') }}..." value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.product') }} / {{ trans('admin.description') }}</label>
                        <textarea id="desc" name="description" rows="4" class="form-control" placeholder="{{ trans('admin.product') }} / {{ trans('admin.description') }}...">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="brand"> {{ trans('admin.product') }} / {{ trans('admin.brand') }}</label>
                        <input type="text" id="brand" name="brand" class="form-control" placeholder="{{ trans('admin.product') }} / {{ trans('admin.brand') }}..." value="{{ old('brand') }}">
                    </div>

                    <div class="form-group">
                        <label for="rate"> {{ trans('admin.product') }} / {{ trans('admin.rate') }}</label>
                        <select class="form-control select2" name="rate" id="rate">
                            <option value=""> Select Rate </option>
                            @for($i = 1; $i < 6;$i++)
                                <option value="{{ $i }}"> {{ $i }} Star </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price"> {{ trans('admin.product') }} / {{ trans('admin.price') }}</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="{{ trans('admin.product') }} / {{ trans('admin.price') }}..." value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="offer_price"> {{ trans('admin.product') }} / {{ trans('admin.offer_price') }}</label>
                        <input type="number" id="offer_price" name="offer_price" class="form-control" placeholder="{{ trans('admin.product') }} / {{ trans('admin.offer_price') }}..." value="{{ old('offer_price') }}">
                    </div>

                    <div class="form-group">
                        <label for="title"> {{ trans('admin.product') }} / {{ trans('admin.status') }}</label>
                        <select class="form-control select2" name="status">
                            <option value=""> Select Status </option>
                            <option value="1"> Sale </option>
                            <option value="2"> Sold </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title"> {{ trans('admin.product') }} / {{ trans('admin.category') }}</label>
                        <select class="form-control select2" name="category_id">
                            <option value=""> Select Rate </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="attribute"> {{ trans('admin.product') }} / Attribute</label>
                        <select name="attributes[]" class="form-control select2" multiple="multiple">
                            <option value=""> Select Attributes </option>
                            @foreach($attributes as $attribute)
                                <option value="{{ $attribute->id }}"> {{ $attribute->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="document">{{ trans('admin.product') }} / {{ trans('admin.photos') }}</label>
                        <div class="needsclick dropzone" id="document-dropzone">
                        </div>
                    </div>


                    <div class="text-right mb-5">
                        <input type="submit" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

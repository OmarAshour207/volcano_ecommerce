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
                    <h1 class="m-0"> {{ trans('admin.contact_us') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('contactus.store') }}">
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="ar_desc"> {{ trans('admin.slider') }} / {{ trans('admin.ar_description') }}</label>
                        <textarea id="ar_desc" name="ar_description" rows="4" class="form-control ckeditor" placeholder="{{ trans('admin.slider') }} / {{ trans('admin.ar_description') }}...">{{ old('ar_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="en_desc"> {{ trans('admin.slider') }} / {{ trans('admin.en_description') }}</label>
                        <textarea id="en_desc" name="en_description" rows="4" class="form-control ckeditor" placeholder="{{ trans('admin.slider') }} / {{ trans('admin.en_description') }}...">{{ old('en_description') }}</textarea>
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

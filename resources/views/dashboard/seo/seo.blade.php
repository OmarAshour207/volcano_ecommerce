@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.seo') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.seo') }} </h1> <h3> / {{ trans('admin.meta_tags') }} </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('settings.contact.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="title"> {{ trans('admin.seo') }} /  {{ __('admin.website_title') }} </label>
                        <input id="title" name="website_title" type="text" class="form-control" placeholder="{{ __('admin.seo') }} / {{ __('admin.website_title') }}" value="{{ old('website_title', setting('website_title')) }}">
                    </div>

                    <div class="form-group">
                        <label for="keywords"> {{ trans('admin.seo') }} / {{ trans('admin.keywords') }} / {{ __('admin.seperate_with_comma') }} </label>
                        <input id="keywords" name="meta_keywords" type="text" class="form-control" placeholder="{{ __('admin.keywords') }} / {{ __('admin.seperate_with_comma') }}" value="{{ old('meta_keywords', setting('meta_keywords')) }}">
                    </div>

                    <div class="form-group">
                        <label for="author"> {{ trans('admin.seo') }} / {{ trans('admin.author') }}</label>
                        <input id="author" name="meta_author" type="text" class="form-control" placeholder="{{ __('admin.author') }}" value="{{ old('meta_author', setting('meta_author')) }}">
                    </div>

                    <div class="form-group">
                        <label for="description"> {{ trans('admin.seo') }} / {{ trans('admin.description') }}</label>
                        <textarea id="description" name="meta_description" rows="4" class="form-control" placeholder="{{ trans('admin.seo') }} / {{ trans('admin.description') }}...">{{ old('description', setting('meta_description')) }}</textarea>
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

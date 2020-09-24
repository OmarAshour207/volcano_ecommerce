@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.facebook') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.facebook') }} </h1> <h3> / {{ trans('admin.token') }} </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('settings.tokens') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="token"> {{ trans('admin.facebook') }} /  {{ __('admin.token') }} </label>
                        <input id="token" name="facebook_token" type="text" class="form-control" placeholder="{{ __('admin.facebook') }} / {{ __('admin.token') }}" value="{{ old('facebook_token', setting('facebook_token')) }}">
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.how_get_token') }} </label>
                        <a href="https://developers.facebook.com" target="_blank"> {{ __('admin.facebook_link') }} </a>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" disabled value="{{ url('/webhook') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" disabled value="bot123">
                    </div>
                    <div class="form-group">
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/sYuYZD9K2rI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

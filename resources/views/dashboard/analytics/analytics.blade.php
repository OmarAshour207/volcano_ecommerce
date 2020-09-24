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
                    <h1 class="m-0"> {{ trans('admin.seo') }} </h1> <h3> / {{ trans('admin.analytics') }} </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('settings.analytics') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="google_analytics"> {{ trans('admin.seo') }} / {{ trans('admin.analytics') }} / UA-133433427-1 </label>
                        <input type="text" id="google_analytics" name="google_analytics" class="form-control" placeholder="{{ trans('admin.seo') }} / {{ trans('admin.analytics') }}..." value="{{ old('google_analytics', setting('google_analytics')) }}">
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

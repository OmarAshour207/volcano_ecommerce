@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.settings') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.contact_info') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('settings.contact.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="email"> {{ trans('admin.contact_info') }} / {{ trans('admin.email') }}</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('admin.email') }}" value="{{ old('email', setting('email')) }}">
                    </div>

                    <div class="form-group">
                        <label for="phone"> {{ trans('admin.contact_info') }} / {{ trans('admin.phone') }}</label>
                        <input id="phone" name="phone" type="text" class="form-control" placeholder="{{ __('admin.phone') }}" value="{{ old('phone', setting('phone')) }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_address"> {{ trans('admin.contact_info') }} / {{ trans('admin.ar_address') }}</label>
                        <input id="ar_address" name="ar_address" type="text" class="form-control" placeholder="{{ __('admin.ar_address') }}" value="{{ old('ar_address', setting('ar_address')) }}">
                    </div>
                    <div class="form-group">
                        <label for="en_address"> {{ trans('admin.contact_info') }} / {{ trans('admin.en_address') }}</label>
                        <input id="en_address" name="en_address" type="text" class="form-control" placeholder="{{ __('admin.en_address') }}" value="{{ old('en_address', setting('en_address')) }}">
                    </div>

                    @php
                        $socialSites = ['facebook', 'instagram', 'twitter'];
                    @endphp

                    @foreach($socialSites as $socialSite)
                        <div class="form-group">
                            <label for="{{ $socialSite }}"> {{ trans('admin.' . $socialSite) }}</label>
                            <input id="{{ $socialSite }}" name="{{ $socialSite }}" type="url" class="form-control" placeholder="{{ __('admin.' . $socialSite) }}" value="{{ old($socialSite, setting($socialSite)) }}">
                        </div>
                    @endforeach

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

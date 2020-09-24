@extends('dashboard.layouts.app')

@push('admin_styles')
    <link type="text/css" href="{{ asset('dashboard/css/vendor-select2.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard/css/vendor-select2.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard/vendor/select2/select2.min.css') }}" rel="stylesheet">
@endpush

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
                    <h1 class="m-0"> {{ trans('admin.settings') }} </h1> <h3> {{ __('admin.visible') }} / {{ trans('admin.settings_website') }} </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('website-settings.update', $websiteSettings->id) }}">

                    @method('put')
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="filter_page">{{ __('admin.visible') }} {{ __('admin.website_sections') }} </label><br>
                        <select id="filter_page" data-toggle="select" name="filter_page[]" class="form-control" multiple>
                            @php
                            $sections= ['about', 'our_projects', 'contacts','our_services', 'stat', 'team_members', 'testimonials', 'latest_blog'];
                            @endphp
                            {{-- Sections --}}
                            @for($i = 0; $i < count($sections); $i++)
                                @if ($page_filter != null)
                                    <option value="{{ $sections[$i] }}" {{ in_array($sections[$i], $page_filter) ? 'selected' :'' }}> {{ __('admin.' . $sections[$i]) }} </option>
                                @else
                                    <option value="{{ $sections[$i] }}"> {{ __('admin.' . $sections[$i]) }} </option>
                                @endif
                            @endfor

                        </select>
                    </div>

                    @php
                        $colors = [
                            '1'     => 'Orange',
                            '2'     => 'Red',
                            '3'     => 'Yellow',
                            '4'     => 'Blue',
                            '5'     => 'Red Dark',
                            '6'     => 'Green',
                            '7'     => 'Sky',
                            '8'     => 'Orange Dark',
                            ];
                    @endphp
                    <div class="form-group">
                        <label for="website_color">{{ __('admin.settings_website') }} {{ __('admin.website_color') }} </label><br>
                        <select id="website_color" data-toggle="select" name="color" class="form-control">
                            <option value=""> {{ __('admin.choose_color') }} </option>
                            @foreach($colors as $index => $color)
                                <option value="{{ $index }}" {{ $index == $websiteSettings->color ? 'selected' : '' }}> {{ $color }} </option>
                            @endforeach
                        </select>
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

@push('admin_scripts')
    <script src="{{ asset('dashboard/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/select2.js') }}"></script>
@endpush

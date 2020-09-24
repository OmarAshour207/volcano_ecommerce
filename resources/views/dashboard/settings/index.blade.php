@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.settings_website') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.settings_website') }} </h1>
                </div>
                <a href="{{ route('website-settings.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                        <tr>

                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                                    <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th style="width: 30px;" > {{ trans('admin.id') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.about') }} </th>
                            <th style="width: 40px;"> {{ trans('home.our_projects') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.contacts') }} </th>
                            <th style="width: 120px;" > {{ trans('home.our_services') }} </th>
                            <th style="width: 120px;" > {{ trans('home.stat') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.team_members') }} </th>
                            <th style="width: 120px;" >{{ trans('admin.testimonials') }}</th>
                            <th style="width: 30px;" > {{ trans('home.latest_blog') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.color') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($websiteSettings != null)
                                <tr>
                                    <td class="text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                            <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                        </div>
                                    </td>
                                    <td style="width: 30px;">
                                        <div class="badge badge-soft-dark"> {{ $websiteSettings->id }} </div>
                                    </td>

                                    @php
                                    $sections = ['about', 'our_projects', 'contacts','our_services', 'stat', 'team_members', 'testimonials', 'latest_blog'];
                                    $pageFilter = unserialize($websiteSettings->page_filter);
                                    @endphp
                                    @for($i = 0;$i < count($sections);$i++)
                                        @if(in_array($sections[$i], $pageFilter))
                                            <td style="width: 40px;">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        {{ __('admin.visible') }}
                                                    </div>
                                                </div>
                                            </td>
                                            @else
                                            <td style="width: 40px;">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        {{ __('admin.not_visible') }}
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endfor


                                    @php
                                        $colors = [
                                            1     => 'Orange',
                                            2     => 'Red',
                                            3     => 'Yellow',
                                            4     => 'Blue',
                                            5     => 'Red Dark',
                                            6     => 'Green',
                                            7     => 'Sky',
                                            8     => 'Orange Dark',
                                            ];
                                    @endphp
                                    <td style="width: 30px;">
                                        <div class="badge badge-soft-dark">
                                            @foreach($colors as $index => $color)
                                                @if ($index == $websiteSettings->color)
                                                    {{ $color }}
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('website-settings.edit', $websiteSettings->id) }}" class="btn btn-sm btn-link">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                    </td>

                        @else
                            <h1> {{ trans('admin.no_records') }} </h1>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page"><i class="material-icons icon-20pt"> {{ trans('admin.home') }} </i></li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.dashboard') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">
            <div class="card-group">
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-briefcase"></i></div>
                    <div class="text-amount"> {{ $services_count }} </div>
                    <div class="card-header__title mb-2"> {{ __('admin.services') }} </div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-envelope"></i></div>
                    <div class="text-amount"> {{ $contacts_count }} </div>
                    <div class="card-header__title  mb-2">{{ __('admin.contacts') }}</div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-check-circle"></i></div>
                    <div class="text-amount">{{ $testimonials_count }}</div>
                    <div class="card-header__title  mb-2">{{ __('admin.testimonials') }}</div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-book-open"></i></div>
                    <div class="text-amount"> {{ $blogs_count }} </div>
                    <div class="card-header__title  mb-2">{{ __('admin.blogs') }}</div>
                </div>

            </div>
            <div class="card-group">
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-eye"></i></div>
                    <div class="text-amount">{{ $visible_sections }}</div>
                    <div class="card-header__title  mb-2">{{ __('admin.visible_sections') }}</div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-eye-slash"></i></div>
                    <div class="text-amount">{{ $hidden_sections }}</div>
                    <div class="card-header__title  mb-2">{{ __('admin.hidden_sections') }}</div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-paint-brush"></i></div>
                    <div class="text-amount">{{ $website_color }}</div>
                    <div class="card-header__title  mb-2">{{ __('admin.website_color') }}</div>
                </div>
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-user-friends"></i></div>
                    <div class="text-amount">{{ $visitors_count }}</div>
                    <div class="card-header__title  mb-2">{{ __('admin.visitors') }}</div>
                </div>
            </div>
            <div class="card-group">
                <div class="card card-body text-center">
                    <div class="mb-1"><i class="icon-muted icon-40pt fa fa-user"></i></div>
                    <div class="text-amount">{{ $most_visited }}</div>
                    <div class="card-header__title  mb-2">{{ $most_visited_page .'  '.  __('admin.most_visited') }}</div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-white d-flex align-items-center">
                            <h4 class="card-header__title flex m-0">{{ __('admin.visitors_through_month') }}</h4>
                            <div data-toggle="flatpickr" data-flatpickr-wrap="true" data-flatpickr-static="true" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                                <a href="javascript:void(0)" class="link-date" data-toggle><span class="text-muted mx-1">{{ __('admin.from') }}</span> {{ Carbon\Carbon::now()->subMonth()->format('Y/M/d') }} <span class="text-muted mx-1">{{ __('admin.to') }}</span> {{ date('Y/M/d') }} </a>
                                <input class="flatpickr-hidden-input" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                            </div>
                        </div>
                        <div class="card-body text-muted">
                            <div class="chart" style="height: calc(248px);">
                                <canvas id="earningTrafficChart">
                                    <span style="font-size: 1rem;"><strong>Website Traffic / visitors</strong> area chart goes here.</span>
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-header bg-white">
                            <h4 class="card-header__title m-0"> {{ __('admin.pages_visitors') }} </h4>
                        </div>
                        <div class="card-body py-4">
                            @foreach($pages_in_percentage as $page => $index)
                            <div class="d-flex justify-content-between pb-1">
                                <span> {{ $page }} </span>
                                <div>
                                    <strong> {{ round(($index/100) * $visitors_count) }} </strong>
                                    <span class="text-muted">/ {{ $visitors_count }}</span>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $index }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
@push('admin_scripts')
    <script>
        var ctx = document.getElementById('earningTrafficChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [ '{{ __('admin.home') }}', '{{ __('admin.about') }}', '{{ __('admin.our_services') }}',
                    '{{ __('admin.blogs') }}', '{{ __('admin.contacts') }}' ],
                datasets: [{
                    label: '{{ __('admin.pages_visitors') }}',
                    data: [{{ $visited_pages_in_month[0] }}, {{ $visited_pages_in_month[1] }}, {{ $visited_pages_in_month[2] }},
                        {{ $visited_pages_in_month[3] }},{{ $visited_pages_in_month[4] }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {

                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: '{{ $visitors_count }}',
                        }
                    }]
                }
            }
        });
    </script>
@endpush

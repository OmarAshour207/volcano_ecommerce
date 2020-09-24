@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.notifications') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('admin.all_notifications') }} </h1>
                </div>
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

                            <th style="width: 30px;"> {{ trans('admin.id') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.full_name') }} </th>
                            <th style="width: 120px;"> {{ trans('admin.content') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.status') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.date') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($notifications->count() > 0)
                            @foreach($notifications as $index => $notification)
                                <tr>
                                    <td class="text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                            <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                        </div>
                                    </td>
                                    <td style="width: 30px;">
                                        <div class="badge badge-soft-dark"> {{ $index+1 }} </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ ucfirst($notification->name) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $notification->content }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center btn btn-{{ $notification->status == 0 ? 'success' : 'warning' }}">
                                                {{ $notification->status == 0 ? __('admin.unread') : __('admin.viewed') }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $notification->created_at->format('d M') }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $notifications->appends(request()->query())->links() }}
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

@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.contacts') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.contacts') }} </h1>
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

                            <th style="width: 30px;" > # </th>
                            <th style="width: 40px;"> {{ trans('admin.name') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.email') }} </th>
                            <th style="width: 50px;" >{{ trans('admin.phone') }}</th>
                            <th style="width: 120px;" >{{ trans('admin.message') }}</th>
                            <th style="width: 30px;" > {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($contacts->count() > 0)
                            @foreach($contacts as $index => $contact)
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
                                        {{ $contact->name }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 30px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $contact->email }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:50px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $contact->phone }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:120px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $contact->message }}
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-link">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                            {{ $contacts->appends(request()->query())->links() }}
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

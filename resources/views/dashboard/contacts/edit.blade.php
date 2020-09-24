@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.contacts') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('contacts.update', $contact->id) }}">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="name"> {{ trans('admin.contacts') }} / {{ trans('admin.name') }}</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Contact Name" value="{{ $contact->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email"> {{ trans('admin.contacts') }} / {{ trans('admin.email') }}</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Contact Email" value="{{ $contact->email }}">
                    </div>

                    <div class="form-group">
                        <label for="phone"> {{ trans('admin.contacts') }} / {{ trans('admin.phone') }}</label>
                        <input id="phone" name="phone" type="text" class="form-control" placeholder="Contact Phone" value="{{ $contact->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="message"> {{ trans('admin.contacts') }} / {{ trans('admin.message') }}</label>
                        <textarea id="message" name="message" rows="4" class="form-control" placeholder="{{ trans('admin.contacts') }} / {{ trans('admin.message') }}...">{{ $contact->message }}</textarea>
                    </div>
                    <div class="text-right mb-5">
                        <input type="submit" name="update" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

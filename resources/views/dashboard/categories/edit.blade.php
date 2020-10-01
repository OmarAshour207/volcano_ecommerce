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
                    <h1 class="m-0"> {{ trans('admin.category') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="name"> {{ trans('admin.state') }} / {{ trans('admin.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="{{ trans('admin.state') }} / {{ trans('admin.name') }}..." value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                        <label for="name"> {{ trans('admin.category') }} / Parent </label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">Parent</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : '' }}> {{ $parent->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

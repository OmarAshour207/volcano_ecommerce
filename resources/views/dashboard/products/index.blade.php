@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.product') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.product') }} </h1>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
            </div>
            <form class="search-form d-none d-sm-flex flex">
                <button class="btn" type="submit"><i class="material-icons">search</i></button>
                <input type="text" name="search" value="{{ request('search') ?? '' }}" class="form-control" placeholder="Search using Name">
            </form>
            <br>
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
                            <th style="width: 40px;" > {{ trans('admin.title') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.description') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.brand') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.rate') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.price') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.offer_price') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.status') }} </th>
                            <th style="width: 40px;" > {{ trans('admin.category') }} </th>
                            <th style="width: 120px;" >{{ trans('admin.image') }}</th>
                            <th style="width: 30px;" > {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($products->count() > 0)
                            @foreach($products as $product)
                        <tr>
                            <td class="text-left">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                    <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td style="width: 30px;">
                                <div class="badge badge-soft-dark"> {{ $product->id }} </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ substr($product->title, 0, 20)  }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ substr($product->description, 0, 20)  }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->brand  }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->rate  }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->price  }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->offer_price  }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->status == 1 ? 'Sale' : 'Sold'  }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $product->category->name  }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:120px" class="text-center">
                                <img src="{{ Storage::url('public/products/' . explode('|', $product->image)[0]) }}" style="width: 120px; height: 50px">
                            </td>

                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-link">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                            {{ $products->appends(request()->query())->links() }}
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

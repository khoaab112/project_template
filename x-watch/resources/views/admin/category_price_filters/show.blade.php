@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category Price Filters
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.category_price_filters.show_fields')
                    <a href="{{ route('categoryPriceFilters.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

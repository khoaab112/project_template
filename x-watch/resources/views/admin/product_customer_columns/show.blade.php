@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Customer Column
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.product_customer_columns.show_fields')
                    <a href="{{ route('productCustomerColumns.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

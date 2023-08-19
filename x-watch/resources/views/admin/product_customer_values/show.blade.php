@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Customer Value
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.product_customer_values.show_fields')
                    <a href="{{ route('productCustomerValues.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Customer Value
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productCustomerValues.store']) !!}

                        @include('admin.product_customer_values.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

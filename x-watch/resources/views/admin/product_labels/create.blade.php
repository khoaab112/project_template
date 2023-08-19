@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Label
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productLabels.store', "enctype" => "multipart/form-data"]) !!}

                        @include('admin.product_labels.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

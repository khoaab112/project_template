@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Bonus
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productBonuses.store', "enctype" => "multipart/form-data"]) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('File Upload', 'File Upload:') !!}
                        <input type="file" name="file" class="form-control">
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('productBonuses.index') }}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

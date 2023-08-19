@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category Price Filters
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoryPriceFilters, ['route' => ['categoryPriceFilters.update', $categoryPriceFilters->id], 'method' => 'patch']) !!}

                   <!-- Category Id Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('category_id', 'Category Id:') !!}
                           <select class="form-control" name="category_id">
                               @foreach($categories as $val)
                                   <option @if($categoryPriceFilters->category_id == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                                       {{$val["name"]}}
                                   </option>
                               @endforeach
                           </select>
                       </div>

                       <div class="form-group col-sm-6">
                           {!! Form::label('name', 'Name:') !!}
                           {!! Form::text('name', null, ['class' => 'form-control']) !!}
                       </div>

                       <div class="form-group col-sm-6">
                           {!! Form::label('from_price', 'From Price:') !!}
                           {!! Form::number('from_price', null, ['class' => 'form-control']) !!}
                       </div>

                       <div class="form-group col-sm-6">
                           {!! Form::label('to_price', 'To Price:') !!}
                           {!! Form::number('to_price', null, ['class' => 'form-control']) !!}
                       </div>

                       <div class="form-group col-sm-12">
                           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                           <a href="{{ route('categoryPriceFilters.index') }}" class="btn btn-default">Cancel</a>
                       </div>


                       {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
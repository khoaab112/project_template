@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Product Attribute Value
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productAttributeValue, ['route' => [
                   'productAttributeValues.update', $productAttributeValue->id],
                   'method' => 'patch',
                   "enctype" => "multipart/form-data"
                   ]) !!}

                        @include('admin.product_attribute_values.fields_update')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

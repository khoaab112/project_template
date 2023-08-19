@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Variant
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productVariant, ['route' => ['productVariants.update', $productVariant->id], 'method' => 'patch']) !!}

                        @include('admin.product_variants.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
       <div class="box box-primary">
        <section class="content-header">
                <h1 class="pull-left">Product Variant In Stock</h1>
                <!-- <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{{ route('productVariants.create') }}?product_id={{$product->id}}">Add New</a>
                </h1> -->
                <div class="clearfix"></div>
            </section>
            <div class="content">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('admin.product_variants.item_in_stock')
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection
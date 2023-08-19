@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Promotion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productPromotion, ['route' => ['productPromotions.update', $productPromotion->id], 'method' => 'patch']) !!}

                        @include('admin.product_promotions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
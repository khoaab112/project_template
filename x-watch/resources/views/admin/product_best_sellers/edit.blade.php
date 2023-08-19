@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Best Seller
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productBestSeller, ['route' => ['productBestSellers.update', $productBestSeller->id], 'method' => 'patch']) !!}

                        @include('admin.product_best_sellers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

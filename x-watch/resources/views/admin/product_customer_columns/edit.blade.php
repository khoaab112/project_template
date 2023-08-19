@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Customer Column
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productCustomerColumn, ['route' => ['productCustomerColumns.update', $productCustomerColumn->id], 'method' => 'patch']) !!}

                        @include('admin.product_customer_columns.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
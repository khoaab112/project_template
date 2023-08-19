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
                   {!! Form::model($productBonus, ['route' => ['productBonuses.update', $productBonus->id], 'method' => 'patch']) !!}

                        @include('admin.product_bonuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
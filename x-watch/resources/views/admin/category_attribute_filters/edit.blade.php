@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category Attribute Filter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoryAttributeFilter, ['route' => ['categoryAttributeFilters.update', $categoryAttributeFilter->id], 'method' => 'patch']) !!}

                        @include('admin.category_attribute_filters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

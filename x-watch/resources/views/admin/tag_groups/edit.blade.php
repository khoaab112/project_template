@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tag Group
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tagGroup, ['route' => ['tagGroups.update', $tagGroup->id], 'method' => 'patch']) !!}

                        @include('admin.tag_groups.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

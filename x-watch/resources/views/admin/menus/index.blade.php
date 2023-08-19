@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Menus</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('menus.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-4">
                    <div>

                        @foreach($menusTree as $key => $val)
                            <div>
                                @if($val["level"] == 1){{"----"}}@endif
                                @if($val["level"] == 2){{"------"}}@endif
                                <a href="{{ route('menus.edit', $val["id"]) }}" class='btn btn-default btn-xs'>
                                    {{$val["name"]}}
                                </a>
                                <a target="_blank" href="{{$val["url"]}}">Link</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    @include('admin.menus.table')
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


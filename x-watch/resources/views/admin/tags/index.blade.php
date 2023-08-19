@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tags</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('tags.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="form-group col-md-3">
                        {!! Form::label('tag_group', 'Tag Group:') !!}
                        <select name="tag_group_id" class="form-control">
                            <option value="0">All</option>
                            @foreach($tagGroups as $tagGroup)
                                <option @if(request()->get('tag_group_id') == $tagGroup->id) selected
                                        @endif value="{{$tagGroup->id}}">{{$tagGroup->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 pull-right text-right">
                        <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="clearfix"></div>
                    @include('admin.tags.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Category Brands</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('categoryBrands.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            {!! Form::label('category_id', 'Category Id:') !!}
                            <select class="form-control" name="category_id" onchange="this.form.submit()">
                                <option value="0">All</option>
                                @foreach($categories as $val)
                                    <option @if(request()->get('category_id') == $val["id"]) selected @endif value="{{$val["id"]}}">
                                        @if($val["level"] == 1){{"----"}}@endif
                                        @if($val["level"] == 2){{"------"}}@endif
                                        {{$val["name"]}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('brand_id', 'Brand:') !!}
                            <select name="brand_id" class="form-control" onchange="this.form.submit()">
                                <option value="0">All</option>
                                @foreach($brands as $brand)
                                    <option @if(request()->get('brand_id') == $brand->id) selected
                                            @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 pull-right text-right">
                            <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.category_brands.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


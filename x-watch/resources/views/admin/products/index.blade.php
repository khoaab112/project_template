@extends('admin.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <section class="content-header">
        <h1 class="pull-lefts">Products</h1>
        <h1 class="pull-rights">
            <a class="btn btn-primary pull-right" style="" href="{{ route('products.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Product ID</label>
                            <input type="text" value="{{request()->get('product_id')}}" placeholder="Mã sản phẩm.."
                                   name="product_id"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Product Name</label>
                            <input type="text" value="{{request()->get('search')}}" placeholder="Search.." name="search"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Product Status</label>
                            <select name="status" class="form-control">
                                <option value="0">All</option>
                                <option value="{{\App\Models\Product::PRODUCT_STATUS_IS_ACTIVE}}">Active</option>
                                <option value="{{\App\Models\Product::PRODUCT_STATUS_IS_DISABLE}}">InActive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Product SKU</label>
                            <input type="text" placeholder="Sku" name="sku" value="{{request()->get('sku')}}"
                                   class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('category_id', 'Category Id:') !!}
                            <select class="form-control" name="category_id">
                                <option value="0">All</option>
                                @foreach($categories as $val)
                                    <option @if(request()->get('category_id') == $val["id"]) selected
                                            @endif value="{{$val["id"]}}">
                                        @if($val["level"] == 1){{"----"}}@endif
                                        @if($val["level"] == 2){{"------"}}@endif
                                        {{$val["name"]}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('brand_id', 'Brand:') !!}
                            <select name="brand_id" class="form-control">
                                <option value="0">All</option>
                                @foreach($brands as $brand)
                                    <option @if(request()->get('brand_id') == $brand->id) selected
                                            @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--<div class="form-group col-md-3">--}}
                            {{--<label>Seo Status</label>--}}
                            {{--<select name="sync_seo" class="form-control">--}}
                                {{--<option value="-1">All</option>--}}
                                {{--<option @if(request()->get("sync_seo") == 0) selected @endif value="0">Chưa đồng bộ</option>--}}
                                {{--<option @if(request()->get("sync_seo") == 1) selected @endif value="1">Đã đồng bộ</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="col-md-3 pull-right text-right">
                            <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.products.table')
            </div>
        </div>
    </div>
    <style type="text/css">
        .skin-blue .content-header {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }


        .search-product button {
            min-width: 40px;
        }

        .skin-blue .content-header svg {
            width: 15px;
            position: relative;
            top: 2px;
        }
    </style>
@endsection


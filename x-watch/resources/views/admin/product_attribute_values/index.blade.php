@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Product Attribute Values</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('productAttributeValues.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Product ID:</label>
                            <input type="text" name="product_id" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>SKU:</label>
                            <input type="text" name="sku" class="form-control" value="{{request()->get('sku')}}">
                        </div>
                    </div>
                    <div class="col-md-12 pull-right text-right">
                        <button type="submit" class="btn btn-info ">Tìm kiếm</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.product_attribute_values.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


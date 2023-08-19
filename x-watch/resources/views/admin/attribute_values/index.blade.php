@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Attribute Values</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('attributeValues.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Attribute Name</label>
                            <input type="text" value="{{request()->get('attribute_name')}}" placeholder="Mã sản phẩm.."
                                   name="attribute_name"
                                   class="form-control">
                        </div>
                        <div class="col-md-3 pull-right text-right">
                            <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.attribute_values.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


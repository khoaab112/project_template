@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Product Bonuses</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('productBonuses.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <form>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>SKU:</label>
                            <input type="text" name="sku" class="form-control" value="{{request()->get('sku')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.product_bonuses.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


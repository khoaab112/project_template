@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Categories</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('categories.create') }}">Add New</a>
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
                            <label>Seo Status</label>
                            <select name="sync_seo" class="form-control">
                                <option @if(request()->get("sync_seo") == 0) selected @endif value="0">Chưa đồng bộ</option>
                                <option @if(request()->get("sync_seo") == 1) selected @endif value="1">Đã đồng bộ</option>
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
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.categories.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


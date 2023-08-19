@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <!-- <div style="margin-top: 20px">
    <div>
            <div class="col-md-3">
                Date: <input type="text" class="datetimepicker">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-sm" type="submit" id="sync_promotion">Sync</button>
            </div>
    </div>
        <div class="clearfix"></div>
    </div> -->
    <div style="margin-top: 20px">
        <form method="POST" enctype="multipart/form-data" action="{{ route('productPromotions.fileUpload') }}">
            {{csrf_field()}}
            <div class="col-md-3">
                <label>File Upload:</label>
                <input type="file" name="file" class="form-control">
            </div>

            <div class="col-md-3">
                <label>Loại chương trình:</label>
                <select name="promotion_type" class="form-control">
                    <option value="{{\App\Models\ProductPromotion::PRODUCT_PROMOTION_TYPE_IS_DEFAULT}}">Chương Trình
                        Tháng
                    </option>
                    <option value="{{\App\Models\ProductPromotion::PRODUCT_PROMOTION_TYPE_IS_FLASH_SALE}}">Chương Trình
                        Flash Sale
                    </option>
                </select>
            </div>

            <div class="col-md-3" style="margin-top: 25px">
                <button class="btn btn-primary" type="submit">Import</button>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <section class="content-header">
        <h1 class="pull-left">Product Promotions</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Product ID</label>
                            <input type="text" value="{{request()->get('product_id')}}" placeholder="Mã sản phẩm.."
                                   name="product_id" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Mã SKU</label>
                            <input type="text" value="{{request()->get('sku')}}" placeholder="Mã sản phẩm.." name="sku"
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
                @include('admin.product_promotions.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#sync_promotion").on("click", function (e) {
                var date = $('.datetimepicker').val();
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route("sync_promotion_netsuite")}}',
                    data: {'date': date},
                    success: function(data){
                        location.reload();
                    }
                });
            })
        });
    </script>
@endpush
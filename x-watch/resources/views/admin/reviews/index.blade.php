@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Reviews</h1>
        <div class="clearfix"></div>
        <div style="margin-top: 20px">
            <form method="POST" enctype="multipart/form-data" action="{{ route('review.fileUpload') }}">
                {{csrf_field()}}
                <div class="col-md-3">
                    <label>File Upload:</label>
                    <input type="file" name="file" class="form-control">
                </div>


                <div class="col-md-3" style="margin-top: 25px">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('reviews.create') }}">Add New</a>
        </h1>
        <div class="clearfix"></div>
        <form class="search-product" action="" method="get">
            <div class="row">
                <div class="form-group col-md-3">
                    <label>ID Product</label>
                    <input type="text" value="{{request()->get('product_id')}}" placeholder="Mã sản phẩm.."
                           name="product_id"
                           class="form-control">
                </div>


                <div class="form-group col-md-3">
                    <label>Review Status</label>
                    {!! Form::select('status',array(''=>'Tất cả',\App\Models\Review::REVIEW_STATUS_ACTIVE => "Active",
                    \App\Models\Review::REVIEW_STATUS_DISABLE => "Disable",
                    \App\Models\Review::REVIEW_STATUS_PENDING=> "Pending")
                    ,Request::input('status'),array('class'=>'form-control')) !!}

                </div>




                <div class="col-md-3">
                    <div class="form-group">
                        <label>Từ ngày:</label>
                        <input id="time_start" type="text" name="time_start"
                               class="form-control datetimepicker" value=""
                        >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Đến ngày:</label>
                        <input id="time_end" type="text" name="time_end"
                               class="form-control datetimepicker"
                        >
                    </div>
                </div>
                <div class="col-md-3 ">
                    <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </section>
    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.reviews.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    <script type="text/javascript">
        {{--document.getElementById('time_start').value = "<?php if(isset($_GET['time_start'])) {echo $_GET['time_start'];} else{echo date('Y-m-d', time());}?>";--}}
		document.getElementById('time_start').value = "<?php if(isset($_GET['time_start'])) echo $_GET['time_start'];?>";
		document.getElementById('time_end').value = "<?php if(isset($_GET['time_end'])) echo $_GET['time_end'];?>";
    </script>
@endsection


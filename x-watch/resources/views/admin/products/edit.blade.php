@extends('admin.layouts.app')

@section('content')


    <section class="content-header">
        <h1>Product</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($product, ["id" => "productEdit", 'route' => ['products.update', $product->id], 'method' => 'patch', "enctype" => "multipart/form-data"]) !!}
                    @include('admin.products.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div>
        @include('flash::message')
        <section class="content-header">
            <h1>Cấu tạo nệm</h1>
        </section>
        <div class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="conten">
                        <form  action="{{route("admin.product.addTag", ["productId" => $product->id])}}"  method="post">
                            @foreach($tagGroup as $val)
                                <div class="form-group col-sm-6">

                            {{csrf_field()}}

                                {!! Form::label('default_img', $val->name) !!}
                                <select name="tag_id[]" class="js-select2" multiple="multiple" style="width: 100% !important;">
                                    @foreach($val->tags as $tag)
                                        <option @if(in_array($tag->id,$productTags)) selected @endif value="{{$tag->id}}" data-badge="">{{$tag->name}}</option>
                                    @endforeach
                                </select>


                                 </div>
                            @endforeach

                                <div class="form-group col-sm-6" style="margin-top: 20px">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <section class="content-header">
            <h1>SEO Content</h1>
        </section>
        <div class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @if(!empty($seoContent))
                            {!! Form::model($seoContent, ['route' => ['seoContents.update', $seoContent->id], 'method' => 'patch']) !!}
                        @else
                            {!! Form::open(['route' => 'seoContents.store']) !!}
                            {{csrf_field()}}
                        @endif
                        <input type="hidden" name="entity_id" value="{{$product->id}}">
                        <input type="hidden" name="entity_type"
                               value="{{ \App\Models\SeoContent::SEO_PRODUCT }}">
                        <div class="form-group col-sm-12">
                            {!! Form::label('meta_title', 'Meta Title:') !!}
                            {!! Form::text('meta_title', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
                        </div>
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('meta_keyword', 'Meta Keyword:') !!}
                            {!! Form::text('meta_keyword', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('meta_des', 'Meta Des:') !!}
                            {!! Form::textarea('meta_des', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <h1>Product Images</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div style="margin-top: 20px;">
                    @foreach($product->images as $image)
                        <div style="float:left;margin-right:5px;position: relative">
                            <img width="150px"
                                 src="{{route("productImageShow", ["id" => $image->product_id, "fileName" => $image->name])}}">
                            <div style="position: absolute; top: 0px; right: 0px">
                                {!! Form::open(['route' => ['productImages.destroy', $image->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1 class="pull-left">Product Variant</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-bottom: 5px" href="{{ route('productVariants.create') }}?product_id={{$product->id}}">Add New</a>
        </h1>
        <div class="clearfix"></div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.products.table_variant')
            </div>
        </div>
    </div>

    <style>
        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }
        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }
        .select2-results__option[aria-selected=true]:before {
            font-family:fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #f77750;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }
        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }
        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #f77750;
            border-width: 2px;
        }
        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }
        .select2-container--open .select2-dropdown--below {

            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);

        }
        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }
        /* select with icons badges single*/
        .select-icon .select2-selection__placeholder .badge {
            display: none;
        }
        .select-icon .placeholder {
            /* 	display: none; */
        }
        .select-icon .select2-results__option:before,
        .select-icon .select2-results__option[aria-selected=true]:before {
            display: none !important;
            /* content: "" !important; */
        }
        .select-icon  .select2-search--dropdown {
            display: none;
        }
    </style>
@endsection

@push('scripts')

   <script>

	   $(".js-select2").select2({
		   closeOnSelect : false,
		   placeholder : "Placeholder",
		   // allowHtml: true,
		   allowClear: true,
		   tags: true // создает новые опции на лету
	   });
   </script>
@endpush

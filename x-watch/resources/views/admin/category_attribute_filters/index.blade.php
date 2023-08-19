@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Category Attribute Filters</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('categoryAttributeFilters.create') }}">Add New</a>
        </h1>
    </section>
    <div class="clearfix"></div>
    <div class="box box-primary">
        <form action="" method="get">
            <div class="box-body">
                <div class="form-group col-sm-3">
                    {!! Form::label('category_id', 'Category Id:') !!}
                    <select class="form-control" name="category_id" onchange="this.form.submit()">
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
                <div class="col-md-3 pull-right text-right">
                    <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @if(!empty($categoryAttributeBranchFilters))
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingBrand">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#brand"
                                       aria-expanded="true"
                                       aria-controls="collapseOne">
                                        Thương Hiệu
                                    </a>
                                </h4>
                            </div>
                            <div id="brand" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingBrand">
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'categoryFilter.updateCategoryBrand']) !!}
                                    <input type="hidden" name="category_id" value="{{Request()->get("category_id")}}">
                                    @foreach($categoryAttributeBranchFilters as $categoryBranch)
                                        <div class="form-group col-sm-6 filter-item">
                                            <div class="col-md-4">
                                                <label>{{$categoryBranch->brand->name}}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control"
                                                       name="filter_value[{{$categoryBranch->brand->id}}]"
                                                       value="{{$categoryBranch->position}}"
                                                       placeholder="Vị trí">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" class="removerItem">
                                                    <i class="glyphicon glyphicon-trash"
                                                       style="margin-top: 10px;color: red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group col-sm-12 text-right">
                                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
                                        <a class="btn btn-default"
                                           href="{{ route('categoryBrands.create', ["category_id" => Request()->get("category_id")]) }}">Thêm
                                            mới</a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($categoryAttributePriceFilters))
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#price"
                                       aria-expanded="true"
                                       aria-controls="collapseOne">
                                        Giá
                                    </a>
                                </h4>
                            </div>
                            <div id="price" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'categoryFilter.updateCategoryPrice']) !!}
                                    <input type="hidden" name="category_id" value="{{Request()->get("category_id")}}">
                                    @foreach($categoryAttributePriceFilters as $categoryPrice)
                                        <div class="form-group col-sm-6 filter-item">
                                            <div class="col-md-4">
                                                <label>
                                                    @if($categoryPrice->name != '')
                                                        {{$categoryPrice->name}}
                                                    @else
                                                        {{price($categoryPrice->from_price)}}
                                                        - @if($categoryPrice->to_price){{price($categoryPrice->to_price)}}
                                                        @else
                                                            {{ "Và cao hơn" }}
                                                        @endif
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control"
                                                       name="filter_value[{{$categoryPrice->id}}]"
                                                       value="{{$categoryPrice->position}}"
                                                       placeholder="Vị trí">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" class="removerItem">
                                                    <a href="{{ route('categoryPriceFilters.edit', [$categoryPrice->id]) }}"
                                                       class='btn btn-default btn-xs'>
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group col-sm-12 text-right">
                                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
                                        <a class="btn btn-default"
                                           href="{{ route('categoryPriceFilters.create', ["category_id" => Request()->get("category_id")]) }}">Thêm
                                            mới</a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach($categoryAttributeFilters as $attribute)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#{{$attribute->attribute->attribute_code}}" aria-expanded="true"
                                       aria-controls="collapseOne">
                                        {{$attribute->attribute->name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$attribute->attribute->attribute_code}}" class="panel-collapse collapse"
                                 role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'categoryFilter.updateCategoryAttributeValueFilter']) !!}
                                    <input type="hidden" name="category_attribute_filter_id" value="{{$attribute->id}}">
                                    @foreach($attribute->categoryAttributeValues as $categoryAttributeValue)
                                        <div class="form-group col-sm-6 filter-item">
                                            <div class="col-md-4">
                                                <label>
                                                    {{$categoryAttributeValue->attributeValue->value}}
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control"
                                                       name="filter_value[{{$categoryAttributeValue->attributeValue->id}}]"
                                                       value="{{$categoryAttributeValue->position}}"
                                                       placeholder="Vị trí"
                                                >
                                            </div>
                                            <div class="col-md-2">
                                                <a href="" class="removerItem">
                                                    <i class="glyphicon glyphicon-trash"
                                                       style="margin-top: 10px;color: red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group col-sm-12 text-right">
                                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
                                        <a class="btn btn-default" href="{{ route('categoryAttributeValueFilters.create', [
                                    "category_attribute_id" => $attribute->id,
                                    "category_id" => Request()->get("category_id")
                                    ]) }}">Thêm mới</a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(env("CATEGORY_ID_MATTRESS") == Request()->get("category_id"))
                        @foreach($tagGroup as $key => $group)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#{{$key}}" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            {{$group["name"]}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$key}}" class="panel-collapse collapse"
                                     role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        {!! Form::open(['route' => 'categoryFilter.categoryTag']) !!}
                                        <input type="hidden" name="category_id"
                                               value="{{Request()->get("category_id")}}">
                                        <input type="hidden" name="tag_group_id" value="{{$group["id"]}}">
                                        @foreach($group["tags"] as $tag)
                                            <div class="form-group col-sm-4 filter-item">
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="tags[]"
                                                                   @if(array_key_exists($tag->id, $categoryTagAvailable)) checked="checked"
                                                                   @endif
                                                                   value="{{$tag->id}}"> {{ $tag->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="form-control"
                                                           name="tag_position[{{$tag->id}}]"
                                                           value="@if(array_key_exists($tag->id, $categoryTagAvailable)) {{$categoryTagAvailable[$tag->id]["position"]}}@else {{ "999" }} @endif"
                                                           placeholder="Vị trí">
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="form-group col-sm-12 text-right">
                                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @push('scripts')
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".removerItem").click(function (event) {
                                event.preventDefault();
                                $(this).parent().parent().remove();
                            });
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection


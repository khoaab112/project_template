<div class="table-responsive">
    <table class="table" id="productAttributeValues-table">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Product Variant Id</th>
            <th>Sku</th>
            <th>Attribute</th>
            <th>Attribute Value Id</th>
            <th>Images</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productAttributeValues as $productAttributeValue)
            <tr>
                <td>{{ $productAttributeValue->product_id }}</td>
                <td>{{ $productAttributeValue->product_variant_id }}</td>
                <td>@if(!empty($productAttributeValue->variant)){{ $productAttributeValue->variant->sku }}@endif</td>
                <td>{{ $productAttributeValue->attributeValue->attribute->name }}</td>
                <td>{{ $productAttributeValue->attributeValue->value }}</td>
                <td>
                    @if(!empty($productAttributeValue->productImage))
                        <img width="150px" src="{{route("showImage", [
                            "entity" => "products",
                            "id" => $productAttributeValue->product_id,
                            "size" => 280,
                            "fileName" => $productAttributeValue->productImage->name,
                        ])}}">
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['productAttributeValues.destroy', $productAttributeValue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productAttributeValues.show', [$productAttributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productAttributeValues.edit', [$productAttributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::model($productAttributeValue, ['route' => [
                       'productAttributeValues.update', $productAttributeValue->id],
                       'method' => 'patch',
                       "enctype" => "multipart/form-data"
                    ]) !!}
                    <div class="form-group">
                        <div style="max-width: 350px">
                            @foreach($productImages as $img)
                                <label style="position: relative">
                                    <input name="product_image_id" type="radio" value="{{$img->id}}" style="position: absolute">
                                    <img width="80" src="{{route("productImageShow", ["id" => $img->product_id, "fileName" => $img->name])}}">
                                </label>
                            @endforeach
                        </div>
                        @if(isset($_GET["product_id"]) && !empty($_GET["product_id"]))
                        <button class="form-control btn btn-info" style="width: 80px" type="submit">submit</button>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $productAttributeValues->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

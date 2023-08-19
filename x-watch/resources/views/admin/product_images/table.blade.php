<div class="table-responsive">
    <table class="table" id="productImages-table">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Path</th>
            <th>Type</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productImages as $productImage)
            <tr>
                <td>{{ $productImage->product_id }}</td>
                <td>
                    <img width="50px"
                         src="{{route("productImageShow", [
                    "id" => $productImage->product_id,
                    "fileName" => $productImage->name ?? "default.jpg"
                    ])}}"></td>
                <td>{{ \App\Models\ProductImage::$imageType[$productImage->type] }}</td>
                <td>
                    {!! Form::open(['route' => ['productImages.destroy', $productImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productImages.show', [$productImage->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productImages.edit', [$productImage->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $productImages->links('vendor.pagination.bootstrap-4') }}
</div>

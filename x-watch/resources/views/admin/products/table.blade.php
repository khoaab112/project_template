<div class="table">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>Images</th>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Inventory</th>
            <th>Status</th>
            <th>Notify Sale</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    <img width="50px"
                         src="{{route("productImageShow", [
                         "id" => $product->id,
                         "fileName" => $product->images->first()->name ?? "default.jpg"
                         ])}}">
                </td>
                <td>{{ $product->id }}</td>
                <td>
                    {{ $product->name }} -
                    <a href="{{route("product.detail", ["slug" => $product->slug])}}" target="_blank">
                        Link
                    </a>
                </td>
                <td>{{$product->category->name}}</td>
                <td>{{ $product->brand->name ?? '' }}</td>
                <td @if($product->variants->count() == 0) style="color: red;"@endif>
                    {{ $product->variants->count() }} variants
                </td>
                <td>{{\App\Models\Product::$status[$product->status]}}</td>
                <td>
                    <a class='btn btn-success btn-xs' href="{{ route('notify_sale_product',['id'=>$product->id]) }}">
                        notify sale
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.edit', [$product->id]) }}"
                           class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

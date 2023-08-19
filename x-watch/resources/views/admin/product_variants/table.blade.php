<div class="table-responsive">
    <table class="table" id="productVariants-table">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Sku</th>
            <th>Price</th>
            <th>Compare Price</th>
            <th>Qty</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productVariants as $productVariant)
            <tr>
                <td>{{ $productVariant->product_id }}</td>
                <td>{{ $productVariant->name }}</td>
                <td>{{ $productVariant->slug }}</td>
                <td>{{ $productVariant->sku }}</td>
                <td>{{ $productVariant->price }}</td>
                <td>{{ $productVariant->compare_price }}</td>
                <td>{{ $productVariant->qty }}</td>
                <td>{{\App\Models\ProductVariant::$status[$productVariant->status]}}</td>
                <td>
                    {!! Form::open(['route' => ['productVariants.destroy', $productVariant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productVariants.show', [$productVariant->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productVariants.edit', [$productVariant->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $productVariants->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

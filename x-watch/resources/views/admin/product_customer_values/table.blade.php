<div class="table-responsive">
    <table class="table" id="productCustomerValues-table">
        <thead>
            <tr>
                <th>Product Column Id</th>
        <th>Product Id</th>
        <th>Product Column Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productCustomerValues as $productCustomerValue)
            <tr>
                <td>{{ $productCustomerValue->product_column_id }}</td>
            <td>{{ $productCustomerValue->product_id }}</td>
            <td>{{ $productCustomerValue->product_column_value }}</td>
                <td>
                    {!! Form::open(['route' => ['productCustomerValues.destroy', $productCustomerValue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productCustomerValues.show', [$productCustomerValue->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productCustomerValues.edit', [$productCustomerValue->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="productBestSellers-table">
        <thead>
            <tr>
                <th>Product Id</th>
        <th>Month</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productBestSellers as $productBestSeller)
            <tr>
                <td>{{ $productBestSeller->product_id }}</td>
            <td>{{ $productBestSeller->month }}</td>
                <td>
                    {!! Form::open(['route' => ['productBestSellers.destroy', $productBestSeller->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productBestSellers.show', [$productBestSeller->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productBestSellers.edit', [$productBestSeller->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

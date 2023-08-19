<div class="table-responsive">
    <table class="table" id="productSuggest-table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productSuggest as $productSuggestItem)
            <tr>
                <td>{{ $productSuggestItem->product_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productSuggest.destroy', $productSuggestItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productSuggest.show', [$productSuggestItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productSuggest.edit', [$productSuggestItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

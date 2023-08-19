<div class="table-responsive">
    <table class="table" id="categoryPriceFilters-table">
        <thead>
        <tr>
            <th>Category Id</th>
            <th>From Price</th>
            <th>To Price</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryPriceFilters as $categoryPriceFilter)
            <tr>
                <td>{{ $categoryPriceFilter->category_id }}</td>
                <td>{{ $categoryPriceFilter->from_price }}</td>
                <td>{{ $categoryPriceFilter->to_price }}</td>
                <td>
                    {!! Form::open(['route' => ['categoryPriceFilters.destroy', $categoryPriceFilter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

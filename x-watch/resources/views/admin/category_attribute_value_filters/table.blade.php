<div class="table-responsive">
    <table class="table" id="categoryAttributeValueFilters-table">
        <thead>
        <tr>
            <th>Category Attribute Id</th>
            <th>Attribute Value Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryAttributeValueFilters as $categoryAttributeValueFilter)
            <tr>
                <td>{{ $categoryAttributeValueFilter->category_attribute_filter_id }}</td>
                <td>{{ $categoryAttributeValueFilter->attribute_value_id }}</td>
                <td>
                    {!! Form::open(['route' => ['categoryAttributeValueFilters.destroy', $categoryAttributeValueFilter->id], 'method' => 'delete']) !!}
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

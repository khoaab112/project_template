<div class="table-responsive">
    <table class="table" id="productLabels-table">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Label Id</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productLabels as $productLabel)
            <tr>
                <td>{{ $productLabel->product->name }}</td>
                <td>{{ $productLabel->label->name }}</td>
                <td>{{ date("Y-m-d H:i:s", $productLabel->time_start) }}</td>
                <td>{{ date("Y-m-d H:i:s", $productLabel->time_end) }}</td>
                <td>
                    {!! Form::open(['route' => ['productLabels.destroy', $productLabel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productLabels.show', [$productLabel->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productLabels.edit', [$productLabel->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="brands-table">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->title }}</td>
                <td>{{ $brand->slug }}</td>
                <td>
                    {!! Form::open(['route' => ['productManual.destroy', $brand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('productManual.edit', [$brand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <div>
        {{ $data->links() }}
    </div>
</div>

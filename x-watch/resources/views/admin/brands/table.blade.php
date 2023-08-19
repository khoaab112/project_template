<div class="table-responsive">
    <table class="table" id="brands-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
                <td>{{\App\Models\Brand::$status[$brand->status]}}</td>
                <td>
                      {!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('brands.edit', [$brand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <div>
        {{ $brands->links() }}
    </div>
</div>

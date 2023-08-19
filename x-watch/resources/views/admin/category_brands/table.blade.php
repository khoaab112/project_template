<div class="table-responsive">
    <table class="table" id="categoryBrands-table">
        <thead>
        <tr>
            <th>Category Id</th>
            <th>Brand Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryBrands as $categoryBrand)
            <tr>
                <td>{{ !empty($categoryBrand->category->name) ? $categoryBrand->category->name : ''}}</td>
                <td>{{ $categoryBrand->brand->name ?? $categoryBrand->brand->name }}</td>
                <td>
                    {!! Form::open(['route' => ['categoryBrands.destroy', $categoryBrand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $categoryBrands->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<script>

</script>

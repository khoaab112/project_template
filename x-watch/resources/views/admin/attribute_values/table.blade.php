<div class="table-responsive">
    <table class="table" id="attributeValues-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Attribute Name</th>
            <th>Giá trị</th>
            <th>Code</th>
            <th colspan="3">Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attributeValues as $attributeValue)
            <tr>
                <td>{{ $attributeValue->id }}</td>
                <td>{{ $attributeValue->attribute->name }}</td>
                <td>{{ $attributeValue->value }}</td>
                <td>{{ $attributeValue->code }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('attributeValues.show', [$attributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('attributeValues.edit', [$attributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $attributeValues->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

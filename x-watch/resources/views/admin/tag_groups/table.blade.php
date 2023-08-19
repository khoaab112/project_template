<div class="table-responsive">
    <table class="table" id="tagGroups-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Code</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tagGroups as $tagGroup)
            <tr>
                <td>{{ $tagGroup->name }}</td>
            <td>{{ $tagGroup->code }}</td>
                <td>
                    {!! Form::open(['route' => ['tagGroups.destroy', $tagGroup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tagGroups.show', [$tagGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tagGroups.edit', [$tagGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

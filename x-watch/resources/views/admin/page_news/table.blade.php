<div class="table-responsive">
    <table class="table" id="pageNews-table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Comment</th>
            <th>Slost</th>
            <th>Status</th>
            <th>Type</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pageNews as $pageNews)
            <tr>
                <td>
                    <img width="150px" src="{{route("showImageFolder", ['folder' => 'page_news',"fileName" => $pageNews->name])}}">
                </td>
                <td>{{ $pageNews->title }}</td>
                <td>{{ $pageNews->comment }}</td>
                <td>{{ $pageNews->slost }}</td>
                <td>@if($pageNews->status == 0) No @endif @if($pageNews->status == 1) Yes @endif</td>
                <td>@if($pageNews->type == 0) Image  @endif  @if($pageNews->type == 1) Video @endif</td>
                <td>
                    {!! Form::open(['route' => ['pageNews.destroy', $pageNews->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pageNews.show', [$pageNews->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pageNews.edit', [$pageNews->id]) }}" class='btn btn-default btn-xs'><i
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

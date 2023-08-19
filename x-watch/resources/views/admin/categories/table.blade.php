<div class="form-group col-sm-5">
    <div>
        <?php
        $cat_tree = array_combine(array_column($cat_tree, 'id'), $cat_tree);
        ?>
        @foreach($cat_tree as $key => $val)
            <div>
                <?php
                if (empty($val["parent_path"])) {
                    $url = url('/' . $val['slug']);
                } else {
                    $parents = explode("/", $val["parent_path"]);
                    $url = '';
                    foreach ($parents as $parent) {
                        $url .= '/' . $cat_tree[$parent]['slug'];
                    }

                    $url .= '/' . $val['slug'];
                }

                ?>
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                <a href="{{ route('categories.edit', $val["id"]) }}" class='btn btn-default btn-xs'>
                    {{$val["name"]}} ------ {{ $val["slug"]}}

                </a>
                <a target="_blank" href="{{url($url)}}">Link</a>
            </div>
        @endforeach
    </div>
</div>
<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Parent Path</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_path }}</td>
                <td>
                    @if($category->status == -1)
                        <label class="label btn-danger">Deactive</label>
                    @endif
                    @if($category->status == 1)
                        <label class="label btn-success">Active</label>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categories.show', [$category->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i
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

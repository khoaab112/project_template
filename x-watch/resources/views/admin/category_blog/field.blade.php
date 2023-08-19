<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <select class="form-control" name="parent_id">
        <option value="0">Root</option>
        @if(!empty($categoryBlogData))
        @foreach($categoryBlogData as $val)
            <option @if(isset($categoryBlogData->parent_id) && $categoryBlogData->parent_id == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                {{$val["title"]}}
            </option>
        @endforeach
        @endif
    </select>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tiêu đề:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'value' => (isset($categoryBlog) ? $categoryBlog->title : old('title'))]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attributes.index') }}" class="btn btn-default">Cancel</a>
</div>

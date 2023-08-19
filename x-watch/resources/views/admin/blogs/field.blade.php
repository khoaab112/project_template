<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <select class="form-control" name="category_blog_id">
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
    {!! Form::label('title', 'Tiêu đề') !!}
    <input type="text" class="form-control" name="title" value="{!! isset($blogData) ? $blogData->title : old('title') !!}">
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Hình ảnh:') !!}
    <input type="file" name="default_image" value="" id="image">
</div>
@if(isset($blogData->image) && !empty($blogData->image))
    <img width="150px"
         src="{!! asset('uploads/brands/'. $blogData->image) !!}">
@endif

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả ngắn') !!}
    <textarea class="form-control" id="ckeditor_short" name="description">@if(isset($blogData->description)){{$blogData->description}}@endif</textarea>

</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Nội dung') !!}
    <textarea class="form-control" id="ckeditor_content" name="content">@if(isset($blogData->content)){{$blogData->content}}@endif</textarea>

</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('blog.index') }}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
    <script src="{{ url('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('libs/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'ckeditor_short', {
                height: 100,
            } );
            CKEDITOR.replace( 'ckeditor_content', {
                height: 300,
            } );
        });
    </script>

@endpush

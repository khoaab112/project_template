<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('tag_group_id', 'tag_group_id:') !!}
    <select class="form-control fstdropdown-select" name="tag_group_id" >

        @foreach($tagIdGroup as $val)
            <option @if(isset($tag) && $tag->tag_group_id == $val->id) selected @endif  value="{{$val->id}}">{{$val->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('img_Chung_chi', 'Img Chứng chỉ:') !!}
    <input type="file" multiple name="tag_img" class="form-control">
</div>
@if(isset($tag->position))
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('position', 'position:') !!}--}}

    {{--{!! Form::text('position', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('position', 'position:') !!}
    {!! Form::select('position', ['1' => '1','2' => '2'], null, ['class' => 'form-control']) !!}
</div>
@endif

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <textarea class="form-control" id="ckeditor" name="description">@if(isset($tag->description)){{$tag->description}}@endif</textarea>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tags.index') }}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
    <script src="{{ url('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('libs/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
	$(document).ready(function () {
		CKEDITOR.replace( 'ckeditor_short', {
            height: 300,
            filebrowserUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=file",
            filebrowserImageUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=image"
        } );
		CKEDITOR.replace( 'ckeditor', {
            height: 300,
            filebrowserUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=file",
            filebrowserImageUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=image"
        } );
	});
</script>
@endpush

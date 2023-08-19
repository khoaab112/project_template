
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tên thương hiệu:') !!}
    <input type="text" class="form-control" name="name" value="{!! isset($brand) ? $brand->name: old('name') !!}">
</div>
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Hình ảnh:') !!}
    <input type="file" name="brand_img" value="" id="brand_img">
</div>
@if(isset($brand->image) && !empty($brand->image))
    <img width="150px"
         src="{!! asset('uploads/brands/'. $brand->image) !!}">
@endif
<div class="clearfix"></div>
<div class="form-group col-sm-6" style="float: revert">
    {!! Form::label('homepage_active', 'Homepage Active:') !!}
    {!! Form::select('homepage_active', ['1' => 'Enable','0' => 'Disable'], null, ['class' => 'form-control']) !!}

</div>

<div class="form-group col-sm-6" style="float: revert">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Enable','0' => 'Disable'], null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <textarea class="form-control" id="ckeditor" name="description">@if(isset($brand->description)){{$brand->description}}@endif</textarea>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('brands.index') }}" class="btn btn-default">Cancel</a>
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

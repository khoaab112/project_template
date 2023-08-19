<div class="form-group col-sm-12">
    {!! Form::label('name', 'Tiêu đề:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Nội dung:') !!}
    <textarea class="form-control" id="ckeditor" name="content">@if(isset($productManual->content)){{$productManual->content}}@endif</textarea>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productManual.index') }}" class="btn btn-default">Cancel</a>
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

<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <select class="form-control" name="parent_id">
        <option value="0">Root</option>
        @foreach($categories as $val)
            <option @if(isset($category->parent_id) && $category->parent_id == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <textarea class="form-control" id="ckeditor"
              name="description">@if(isset($category->description)){{$category->description}}@endif</textarea>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', [\App\Models\Category::CATEGORY_STATUS_IS_ACTIVE => 'Active', \App\Models\Category::CATEGORY_STATUS_IS_NOT_ACTIVE => 'Deactivate'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script src="{{ url('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('libs/ckfinder/ckfinder.js') }}"></script>      <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace('ckeditor', {
                height: 300,
            });
        });
    </script>
@endpush

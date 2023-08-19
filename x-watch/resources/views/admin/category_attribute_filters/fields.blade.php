<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $val)
            <option @if(isset($categoryAttributeFilter["category_id"]) && $categoryAttributeFilter["category_id"] == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('attribute_id', 'Attribute Id:') !!}
    <select class="form-control" name="attribute_id">
        @foreach($attributes as $attribute)
            <option value="{{$attribute->id}}" @if(isset($categoryAttributeFilter) && $categoryAttributeFilter->attribute_id == $attribute->id){{"selected"}}@endif >
                {{$attribute->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::number('position', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Enable','0' => 'Disable'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categoryAttributeFilters.index') }}" class="btn btn-default">Cancel</a>
</div>

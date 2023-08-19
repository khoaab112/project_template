<input type="hidden" name="category_attribute_filter_id" value="{{$categoryAttribute->id}}">
<input type="hidden" name="category_id" value="{{Request()->get("category_id")}}">
<div class="form-group col-sm-6">
    {!! Form::label('attribute_value_id', 'Attribute Value Id:') !!}
    <select class="form-control" name="attribute_value_id">
        @foreach($attributeVales as $attributeVale)
            <option value="{{$attributeVale->id}}">{{$attributeVale->value}}</option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categoryAttributeValueFilters.index') }}" class="btn btn-default">Cancel</a>
</div>

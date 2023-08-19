<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $val)
            <option @if(Request()->get("category_id") == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <select class="form-control fstdropdown-select" name="brand_id" >
        @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categoryBrands.index') }}" class="btn btn-default">Cancel</a>
</div>
